<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;

class ArticleController extends Controller
{
    public function index(){
        // $data = [
        //     [ "id" => 1, "title" => "First Article" ],
        //     [ "id" => 2, "title" => "Second Article" ],
        //     [ "id" => 3, "title" => "Third Article" ],

        // ];

        // $data = Article::all();
        $data = Article::latest()->paginate(3);

        return view("articles.index",[
            'articles' => $data
        ]);
    }

    public function detail($id){
        // $comments = Comment::all();
      
        $data = Article::find($id);
        return view('articles.detail',[
            'article' => $data
            ]);
    }

    public function add(){
        $data = [
            [ "id" => 1, "name" => "News" ],
            [ "id" => 2, "name" => "Tech" ],
            ];
           

        return view('articles.create',[
            'categories' => $data
        ]);
    }

    public function create(Request $request){
        
        $validator = validator($request->all(),[
            'title'=>'required',
            'body'=>'required',
            'cateogry_id'=>'required'
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }
           

        $article = new Article;

        $article->title = $request->title;
        $article->body = $request->body;
        $article->category_id = $request->category_id;

        $article->save();

        return redirect("/articles");
    }


    public function delete($id){
        $article = Article::find($id);
        $article->delete();

        return redirect("/articles")->with("info","Articel Delete");
    }

    public function edit($id){

        $data = [
            [ "id" => 1, "name" => "News" ],
            [ "id" => 2, "name" => "Tech" ],
            [ "id" => 3, "name" => "Meme" ],
            ];

        $article = Article::find($id);

        // return $article;                  
        return view("articles.edit",[
            'categories' => $data,
            'article' => $article
        ]);
    }


    public function update($id, Request $request ,Article $article){
                      
        $article = Article::find($id);
        
        $article->title = $request->title;
        $article->body = $request->body;
        $article->category_id = $request->category_id;

        $article->update();

       return redirect("/articles");
    }


    
}
