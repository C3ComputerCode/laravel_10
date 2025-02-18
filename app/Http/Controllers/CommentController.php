<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return "Comment Create";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated  = $request->validate([
            'content' => 'required |min:3 |unique:comments,',            
        ],[
            'content.required' => 'စာလေးတော့ထည့်ပါ...',
            'content.min' => 'အနည်းဆုံး ၃ လုံးလောက်တော့ရေးပေးပါ...',
            'content.unique' => 'ရှိပြီးသားစာသားဖြစ်နေလို့ပါ...'
        ]);
        $comment = new Comment;
        $comment->content = $request->content;
        $comment->article_id = $request->article_id;
        $comment->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return $comment;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $id = $comment->id;

        $validated  = $request->validate([
            'content' => 'required |min:3 |unique:comments,content,' . $request->id,            
        ],[
            'content.required' => 'စာလေးတော့ထည့်ပါ...',
            'content.min' => 'အနည်းဆုံး ၃ လုံးလောက်တော့ရေးပေးပါ...',
            'content.unique' => 'ရှိပြီးသားစာသားဖြစ်နေလို့ပါ...'
        ]);

        return $request;

        $comment = Comment::find($id);
        $comment->content = $request->content;
        $comment->article_id = $request->article_id;
        $comment->update();
        return back()->with('info',"Comment is updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {   
        $id = $comment->id;
        $comment = Comment::find($id);
        $comment->delete();
        return back()->with('info',"Comment is Deleted.");
    }
}
