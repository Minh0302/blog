@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('/home')}}" class="btn btn-primary"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
                    Danh mục bài viết
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">STT</th>
                          <th scope="col">Tên danh mục</th>
                          <th scope="col">Hình ảnh</th>
                          <th scope="col">Mô tả</th>
                          <th scope="col">Quản lý</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach($category as $key =>$cate)
                        <tr>
                          <th scope="row">{{$i++}}</th>
                          <td>{{$cate->title}}</td>
                          <td><img src="{{asset('public/uploads/'.$cate->image)}}" width="100" height="100"></td>
                          <td>{!!$cate->desc!!}</td>
                          <td>
                            <a href="{{route('category.show',[$cate->id])}}" name="" class="btn btn-success btn-sm mb-1">Edit</a>
                            <form action="{{route('category.destroy',[$cate->id])}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" name="" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm" value="Delete" />
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
