@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('/home')}}" class="btn btn-primary"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
                    Cập nhật danh mục bài viết
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('post.update',[$post->id])}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tiêu đề</label>
                          <input type="text" name="title" class="form-control" aria-describedby="emailHelp" value="{{$post->title}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Views</label>
                          <input type="text" name="views" class="form-control" aria-describedby="emailHelp" value="{{$post->views}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Hình ảnh</label>
                          <input type="file" name="image" class="form-control" value="{{$post->image}}">
                          <img src="{{asset('public/uploads/'.$post->image)}}" width="100" height="100">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Mô tả ngắn</label>
                          <textarea type="text" name="short_desc" class="form-control" id="short_desc" rows="3" style="resize: none;">{{$post->short_desc}}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Mô tả ngắn</label>
                          <textarea type="text" name="desc" class="form-control" id="short_desc" rows="3" style="resize: none;">{{$post->desc}}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Danh mục</label>
                          <select class="custom-select" id="inputGroupSelect01" name="post_category_id">
                            @foreach($category as $key =>$cate)
                                @if($post->post_category_id == $cate->id)
                                    <option selected value="{{$cate->id}}">{{$cate->title}}</option>
                                @else
                                    <option value="{{$cate->id}}">{{$cate->title}}</option>
                                @endif
                            @endforeach
                          </select>
                        </div>
                        <button type="submit" name="capnhatdanhmuc" class="btn btn-primary">Cập nhật</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
