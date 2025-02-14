<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        
        return view("category.index",compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {   
        return view("category.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        // $validator = validator($request->all(),[
        //     'name'=>'required',            
        // ]);

        $validated  = $request->validate([
            'name' => 'required|unique:categories|min:3',            
        ],[
            'name.required' => 'စာလေးတော့ထည့်ပါ...',
            'name.min' => 'အနည်းဆုံး ၃ လုံးလောက်တော့ရေးပေးပါ...',
            'name.unique' => 'ရှိပြီးသားစာသားဖြစ်နေလို့ပါ...'
        ]);

       

        // if($validator->fails()) {
        //     return back()->withErrors($validator);
        // }

        $category = new Category;

        $category->name = $request->name;
        $category->save();
        return redirect("/category");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category,$id)
    {
        $category = Category::find($id);

        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category,$id)
    {
        $category = Category::find($id);

        $validated  = $request->validate([
            'name' => 'required |min:3 |unique:categories,name,' . $request->id,            
        ],[
            'name.required' => 'စာလေးတော့ထည့်ပါ...',
            'name.min' => 'အနည်းဆုံး ၃ လုံးလောက်တော့ရေးပေးပါ...',
            'name.unique' => 'ရှိပြီးသားစာသားဖြစ်နေလို့ပါ...'
        ]);

        $category->name = $request->name;
        $category->update();
        return redirect("/category")->with('info',"Category Updated. ");        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Category $category,$id)
    {
        $category = Category::find($id);
        $category -> delete();

        return redirect("/category")->with('info','Category Deleted');
    }
}
