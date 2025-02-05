<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;


class ArticleController extends Controller
{
    public function index(){
        // $data = [
        //     [ "id" => 1, "title" => "First Article" ],
        //     [ "id" => 2, "title" => "Second Article" ],
        //     [ "id" => 3, "title" => "Third Article" ],

        // ];

        $data = Article::all();

        return view("articles.index",[
            'articles' => $data
        ]);
    }

    public function detail($id){
        return "Controller - Article Detail ".$id;
    }
}
