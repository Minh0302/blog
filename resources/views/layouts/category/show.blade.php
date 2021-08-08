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

                    <form method="POST" action="{{route('category.update',[$category->id])}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tiêu đề</label>
                          <input type="text" name="title" class="form-control" aria-describedby="emailHelp" value="{{$category->title}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Hình ảnh</label>
                          <input type="file" name="image" class="form-control" aria-describedby="emailHelp" value="{{$category->image}}">
                          <img src="{{asset('public/uploads/'.$category->image)}}" width="100" height="100">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Mô tả</label>
                          <textarea type="text" name="desc" class="form-control" id="desc_cate" rows="5" style="resize: none;">{{$category->desc}}</textarea>
                        </div>
                        <button type="submit" name="themdanhmuc" class="btn btn-primary">Cập nhật</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
