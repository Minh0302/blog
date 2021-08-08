@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('/home')}}" class="btn btn-primary"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
                    Thêm danh mục bài viết
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('category.store')}}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tiêu đề</label>
                          <input type="text" name="title" class="form-control" aria-describedby="emailHelp" placeholder="Tiêu đề...">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Hình ảnh</label>
                          <input type="file" name="image" class="form-control" aria-describedby="emailHelp" placeholder="Hình ảnh...">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Mô tả</label>
                          <textarea type="text" name="desc" class="form-control" id="desc_cate" placeholder="Mô tả..." rows="5" style="resize: none;"></textarea>
                        </div>
                        <button type="submit" name="themdanhmuc" class="btn btn-primary">Thêm</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
