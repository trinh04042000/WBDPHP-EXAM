@extends('home')
@section('title', 'NEW')
@section('content')
    <div class="col-12">
        <h2>Tạo mới tin tức</h2>
        <form method="post" action="{{route('spapers.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tiêu đề</label>
                <input name="title" class="form-control" placeholder="title">
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <input name="content" class="form-control" placeholder="content">
            </div>
            <div class="form-group">
                <label>Ảnh đại diện</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button class=" btn btn-secondary" onclick="window.history.go(-1) ; return false;">Cancel</button>
        </form>
    </div>
@endsection
