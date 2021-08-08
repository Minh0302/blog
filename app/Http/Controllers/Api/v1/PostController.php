<?php

namespace App\Http\Controllers\Api\v1;

use App\Post;
use App\CategoryPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Storage;
use File;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::with('category')->orderBy('id','DESC')->paginate(5);
        return view('layouts.post.index')->with(compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = CategoryPost::orderBy('id','DESC')->get();
        $post = Post::orderBy('id','DESC')->get();
        return view('layouts.post.create')->with(compact('category','post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->validate([
        //     'title' => 'required|max:255',
        //     'short_desc' => 'required',
        //     'desc' => 'required',
        //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width:100,min_height:100,max_width:1000,max_height:1000',
        //     'post_category_id' => 'required'
        // ]);
        // $post = new Post();
        // $post->title = $data['title'];
        // $post->short_desc = $data['short_desc'];
        // $post->desc = $data['desc'];
        // $post->post_category_id = $data['post_category_id'];

        // $get_image = $request->image;
        // $path = 'public/uploads/';
        // $get_image_name = $get_image->getClientOriginalName();
        // $name_image = current(explode('.',$get_image_name));
        // $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        // $get_image -> move($path,$new_image);

        // $post->image = $new_image;    
        $post  = new Post();
        $post->title = $request->title;
        $post->views = $request->views;
        $post->short_desc = $request->short_desc;
        $post->desc = $request->desc;
        $post->post_category_id = $request->post_category_id;
        $post->post_date = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        
        if($request['image']){
            $image = $request['image'];
            $ext = $image->getClientOriginalExtension();
            $name = rand(0,99).'_'.$image->getClientOriginalName();
            Storage::disk('public')->put($name,File::get($image));
            $post->image = $name;
        }
        else{
            $post->image = 'default.jpg';
        }

        $post->save();
        return redirect()->back()->with('status','Thêm bài viết thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        $category = CategoryPost::orderBy('id','DESC')->get();
        $post = Post::find($post);
        return view('layouts.post.show')->with(compact('category','post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$post)
    {
        $post  = Post::find($post);
        $post->title = $request->title;
        $post->views = $request->views;
        $post->short_desc = $request->short_desc;
        $post->desc = $request->desc;
        $post->post_category_id = $request->post_category_id;
        $post->post_date = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');

        if($request['image']){
            // unlink('public/uploads/'.$post->image);
            $image = $request['image'];
            $ext = $image->getClientOriginalExtension();
            $name = rand(0,99).'_'.$image->getClientOriginalName();
            Storage::disk('public')->put($name,File::get($image));
            $post->image = $name;
        }

        $post->save();
        return redirect()->route('post.index')->with('status','Thêm bài viết thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        $path = 'public/uploads/';
        $post = Post::find($post);
        unlink($path.$post->image);
        $post->delete();
        return redirect()->route('post.index')->with('status','Xoá bài viết thành công!');
    }
}
