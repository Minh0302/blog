@extends('welcome')
@section('content')
<div class="about">
        <div class="container">
            <div class="about-main">
                <div class="col-md-8 about-left">
                    <div class="about-one">
                        <h3>{{$title_cate->title}}</h3>
                    </div>
                    <div class="about-two">
                        <a href=""><img class="" src="{{asset('public/uploads/'.$title_cate->image)}}" alt="{{Str::slug($title_cate->title)}}" width="100%" height="300"></a>
                        <p>Posted by <a href="#">Lê Minh</a> <a href="#">comments(2)</a></p>
                        <p>{!!$title_cate->desc!!}</p>
                        <ul>
                            <li><p>Share : </p></li>
                            <div class="fb-like" data-href="" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
                        </ul>

                    </div>  
                    <div class="about-tre">
                        <div class="a-1">
                        	@foreach($category_post as $key => $cate_post)
                            <div class="col-md-6 abt-left">
                                <a href="{{route('bai-viet.show',['id' =>$cate_post->id,'slug' =>Str::slug($cate_post->title)])}}"><img src="{{asset('public/uploads/'.$cate_post->image)}}" alt="{{Str::slug($cate_post->title)}}" width="200" height="200" /></a>
                                <h6>{{$cate_post->category->title}}</h6>
                                <h3><a href="{{route('bai-viet.show',['id' =>$cate_post->id,'slug' =>Str::slug($cate_post->title)])}}">{{$cate_post->title}}</a></h3>
                                <p>{!!$cate_post->short_desc!!}</p>
                                <label>{{$cate_post->post_date}}</label>
                            </div>
                            @endforeach
                            <div class="clearfix"></div>
                        </div>
                    </div> 
                    <div style="text-align: center;">
                        {{ $category_post->links() }}
                    </div> 
                </div>
                <div class="col-md-4 about-right heading">
                    <div class="abt-2">
                        <h3>Bài viết xem nhiều</h3>
                            @foreach($view_category as $key => $views)
                            <div class="might-grid">
                                <div class="grid-might">
                                    <a href="{{route('bai-viet.show',['id' =>$views->id,'slug' =>Str::slug($views->title)])}}"><img src="{{asset('public/uploads/'.$views->image)}}" class="img-responsive" alt="{{Str::slug($views->title)}}" width="100%"></a>
                                </div>
                                <div class="might-top">
                                    <h4><a href="{{route('bai-viet.show',['id' =>$views->id,'slug' =>Str::slug($views->title)])}}">{{$views->title}}</a></h4>
                                    <p>{!!substr($views->short_desc,0,150)!!}....</p> 
                                </div>
                                <div class="clearfix"></div>
                            </div>  
                            @endforeach                         
                    </div>
                    <div class="abt-2">
                        <h3>Danh mục gợi ý</h3>
                        <ul>
                            @foreach($suggest_category as $key => $sug)
                            <li><a href="{{route('danh-muc.show',['id'=>$sug->id,'slug'=>Str::slug($sug->title)])}}">{{$sug->title}}</a></li>
                            @endforeach
                        </ul>   
                    </div>
                </div>
                <div class="clearfix"></div> 
                        
            </div>      
        </div>
    </div>

@endsection