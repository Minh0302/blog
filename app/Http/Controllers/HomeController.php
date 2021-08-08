<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CategoryPost;
use App\Post;
use DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tim_kiem(Request $request){
        $keywords = $_GET['keywords'];
        $search_post = Post::with('category')->where('title','LIKE','%'.$keywords.'%')->orWhere('desc','LIKE','%'.$keywords.'%')->paginate(4);
        $category = CategoryPost::all();
        $url_canonical = $request->url();
        return view('pages.search')->with(compact('category','search_post','keywords','url_canonical'));
    }
    public function index(Request $request)
    {
        $all_post = Post::with('category')->paginate(4);
        $category = CategoryPost::all();
        $new_post = Post::with('category')->orderBy('id','DESC')->take(5)->get();
        $view_post = Post::with('category')->orderBy('views','DESC')->take(5)->get();
        $first_post = Post::with('category')->orderBy('views','DESC')->first();
        $url_canonical = $request->url();
        return view('pages.main')->with(compact('category','all_post','new_post','view_post','first_post','url_canonical'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
