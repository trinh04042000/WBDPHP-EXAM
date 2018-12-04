@extends('home')
@section('title', 'UPDATE')
@section('content')
    <div class="col-12">
        <h2>Chỉnh sửa</h2>
        <form method="post" action="{{route('spapers.update', $spaper->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tiêu đề</label>
                <input name="title" class="form-control" placeholder="tiêu đề" value="{{$spaper->title}}">
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <input name="content" class="form-control" placeholder="nội dung" value="{{$spaper->content}}">
            </div>
            <div class="form-group">
                <label>Ảnh đại diện</label>
                <input name="image" class="form-control-file" type="file" value="{{$spaper->image}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button class=" btn btn-secondary" onclick="window.history.go(-1) ; return false;">Cancel</button>
        </form>
    </div>
@endsection