@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('/home')}}" class="btn btn-primary"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
                    Thêm bài viết
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('post.store')}}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tiêu đề</label>
                          <input type="text" name="title" class="form-control" aria-describedby="emailHelp" placeholder="Tiêu đề...">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Views</label>
                          <input type="text" name="views" class="form-control" aria-describedby="emailHelp" placeholder="Views...">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Hình ảnh</label>
                          <input type="file" name="image" class="form-control" aria-describedby="emailHelp" placeholder="Hình ảnh...">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Mô tả ngắn</label>
                          <textarea type="text" name="short_desc" class="form-control" id="short_desc" placeholder="Mô tả ngắn..." rows="3" style="resize: none;"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nội dung</label>
                          <textarea type="text" name="desc" class="form-control" id="desc" placeholder="Mô tả..." rows="5" style="resize: none;"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Danh mục</label>
                          <select class="custom-select" id="inputGroupSelect01" name="post_category_id">
                            @foreach($category as $key =>$cate)
                            <option value="{{$cate->id}}">{{$cate->title}}</option>
                            @endforeach
                          </select>
                        </div>
                        <button type="submit" name="thembaiviet" class="btn btn-primary">Thêm</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
