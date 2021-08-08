<?php

namespace App\Http\Controllers\Api\v1;

use App\CategoryPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Storage;
use File;
class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = CategoryPost::orderBy('id','DESC')->get();
         return view('layouts.category.index')->with(compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $category = new CategoryPost();
        // $category->title = $request->title;
        // $category->save();
        // return redirect()->back();
        // $data = $request->validate([
        //     'title' => 'required|max:255'
        // ]);
        $category = new CategoryPost();
        $category->title = $request->title;
        $category->desc = $request->desc;
        if($request['image']){
            $image = $request['image'];
            $ext = $image->getClientOriginalExtension();
            $name = rand(0,99).'_'.$image->getClientOriginalName();
            Storage::disk('public')->put($name,File::get($image));
            $category->image = $name;
        }
        else{
            $category->image = 'default.jpg';
        }

        $category->save();
        return redirect()->back()->with('status','Thêm danh mục thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function show($categoryPost)
    {
        $category = CategoryPost::find($categoryPost);
        return view('layouts.category.show')->with(compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryPost $categoryPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$categoryPost)
    {
        $category = CategoryPost::find($categoryPost);
        $category->title = $request->title;
        $category->desc = $request->desc;
        if($request['image']){
            $image = $request['image'];
            $ext = $image->getClientOriginalExtension();
            $name = rand(0,99).'_'.$image->getClientOriginalName();
            Storage::disk('public')->put($name,File::get($image));
            $category->image = $name;
        }
        $category->save();
        return redirect()->route('category.index')->with('status','Cập nhật danh mục thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryPost)
    {
        $category = CategoryPost::find($categoryPost);
        $category->delete();
        return redirect()->back();
    }
}

