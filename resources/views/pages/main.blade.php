@extends('welcome')
@section('content')
    <!--banner-starts-->
    @include('pages.banner')
    <!--banner-end-->
<div class="about">
        <div class="container">
            <div class="about-main">
                <div class="col-md-8 about-left">
                    <div class="about-one">
                        <p>{{$first_post->category->title}}</p>
                        <h3>{{$first_post->title}}</h3>
                    </div>
                    <div class="about-two">
                        <a href="{{route('bai-viet.show',['id' =>$first_post->id,'slug' =>Str::slug($first_post->title)])}}"><img src="{{asset('public/uploads/'.$first_post->image)}}" alt="" /></a>
                        <p>Posted by <a href="#">Admin</a> {{$first_post->post_date}} <a href="#">comments(2)</a></p>
                        <p>{!!$first_post->short_desc!!}</p>
                        <div class="about-btn">
                            <a href="{{route('bai-viet.show',['id' =>$first_post->id,'slug' =>Str::slug($first_post->title)])}}">Read More</a>
                        </div>
                        <ul>
                            <li><p>Share : </p></li>
                            <div class="fb-like" data-href="" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
                        </ul>
                    </div>  
                    <div class="about-tre">
                        <div class="a-1">
                            @foreach($all_post as $key => $post)
                            <div class="col-md-6 abt-left">
                                <a href="{{route('bai-viet.show',['id' =>$post->id,'slug' =>Str::slug($post->title)])}}"><img src="{{asset('public/uploads/'.$post->image)}}" alt="{{Str::slug($post->title)}}" width="200" height="200" /></a>
                                <h6>{{$post->category->title}}</h6>
                                <h3><a href="{{route('bai-viet.show',['id' =>$post->id,'slug' =>Str::slug($post->title)])}}">{{$post->title}}</a></h3>
                                <p>{!!$post->short_desc!!}</p>
                                <label>{{$post->post_date}}</label>
                            </div>
                            @endforeach
                            <div class="clearfix"></div>
                        </div>
                    </div> 
                    <div style="text-align: center;">
                        {{ $all_post->links() }}
                    </div>
                    
                </div>
                <div class="col-md-4 about-right heading">
                    <div class="abt-2">
                        <h3>Bài viết mới nhất</h3>
                            @foreach($new_post as $key => $new)
                            <div class="might-grid">
                                <div class="grid-might">
                                    <a href="{{route('bai-viet.show',['id' =>$new->id,'slug' =>Str::slug($new->title)])}}"><img src="{{asset('public/uploads/'.$new->image)}}" class="img-responsive" alt="{{Str::slug($new->title)}}" width="100%"></a>
                                </div>
                                <div class="might-top">
                                    <h4><a href="{{route('bai-viet.show',['id' =>$new->id,'slug' =>Str::slug($new->title)])}}">{{$new->title}}</a></h4>
                                    <p>{!!substr($new->short_desc,0,150)!!}....</p> 
                                </div>
                                <div class="clearfix"></div>
                            </div>  
                            @endforeach                         
                    </div>
                    <div class="abt-2">
                        <h3>Bài viết xem nhiều</h3>
                        <ul>
                            @foreach($view_post as $key => $view)
                            <li><a href="{{route('bai-viet.show',['id' =>$view->id,'slug' =>Str::slug($view->title)])}}">{!!substr($view->short_desc,0,100)!!}....</a></li>
                            @endforeach
                        </ul>   
                    </div>
                </div>
                <div class="clearfix"></div>            
            </div>      
        </div>
    </div>
@endsection