@extends('home')
@section('title', 'Danh sách')
@section('content')
    <div class="col-12">
        <h1>Trang Tin Tức</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Ảnh đại diện</th>
            </tr>
            </thead>
            @if(count($spapers) == 0)
                <tr>
                    <td>Không hiển thị tin </td>
                </tr>
            @endif
            @foreach($spapers as $key =>$spaper)
                <tbody>
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$spaper->title}}</td>
                    <td>{{$spaper->content}}</td>
                    <td><img src="{{'upload/images/'. $spaper->image}}" style="height: 150px;width: 100px"></td>
                    <td><a href="{{route('spapers.edit', $spaper->id)}}" class="btn btn-info">Sửa</a></td>
                    <td><a href="{{route('spapers.destroy', $spaper->id)}}" class="btn btn-danger"
                       onclick="return confirm('Bạn có muốn xoá')">Xoá</a></td>
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>
    <a class="btn btn-primary" href="{{route('spapers.create')}}">Thêm mới</a>
@endsection