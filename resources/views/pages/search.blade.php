@extends('welcome')
@section('content')
<div class="about">
        <div class="container">
            <div class="about-main">
                <div class="col-md-8 about-left">
                    <div class="about-one">
                        <h3>Từ khoá tìm kiếm: {{$keywords}}</h3>
                    </div>
                      
                    <div class="about-tre">
                        <div class="a-1">
                        	@foreach($search_post as $key => $search)
                            <div class="col-md-6 abt-left">
                                <a href="{{route('bai-viet.show',['id' =>$search->id,'slug' =>Str::slug($search->title)])}}"><img src="{{asset('public/uploads/'.$search->image)}}" alt="{{Str::slug($search->title)}}" width="200" height="200" /></a>
                                <h6>{{$search->category->title}}</h6>
                                <h3><a href="{{route('bai-viet.show',['id' =>$search->id,'slug' =>Str::slug($search->title)])}}">{{$search->title}}</a></h3>
                                <p>{!!$search->short_desc!!}</p>
                                <label>{{$search->post_date}}</label>
                            </div>
                            @endforeach
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div style="text-align: center;">
                        {{ $search_post->links() }}
                    </div>  
                </div>
                <div class="col-md-4 about-right heading">
                    <div class="abt-2">
                        <h3>Danh mục gợi ý</h3>
                        <ul>
                            @foreach($category as $key => $sug)
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