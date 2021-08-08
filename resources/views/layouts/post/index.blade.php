@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{url('/home')}}" class="btn btn-primary"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
                    Bài viết
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
                          <th scope="col">Tên bài viết</th>
                          <th scope="col">Hình ảnh</th>
                          <th scope="col">Mô tả ngắn</th>
                          <th scope="col">Nội dung</th>
                          <th scope="col">Danh mục</th>
                          <th scope="col">Quản lý</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach($post as $key =>$pt)
                        <tr>
                          <th scope="row">{{$i++}}</th>
                          <td>{{$pt->title}}</td>
                          <td><img src="{{asset('public/uploads/'.$pt->image)}}" width="100" height="100"></td>
                          <td>{!!$pt->short_desc!!}</td>
                          <td>{!!substr($pt->desc,0,200)!!}</td>
                          <td>{{$pt->category->title}}</td>
                          <td>
                            <a href="{{route('post.show',[$pt->id])}}" name="" class="btn btn-success btn-sm mb-1">Edit</a>
                            <form action="{{route('post.destroy',[$pt->id])}}" method="POST">
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
            {{ $post->links() }}
    </div>
</div>
@endsection
