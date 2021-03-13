@extends('admin.admin_lte')
@section('title','listlesson')
@section('contents')
<div class="col-xl-4 col-xl-offset-4 container">
    <center><h2>Thêm bài học mới</h2></center>
    <form action ="{{ Route('admin.lessons.store') }}" method="post" enctype="multipart/form-data" id="">
    @csrf
    <input type="hidden" class="form-control" name="id" value="{{ $id }}"/>
    <div class="form-group">
        <label for="name">Name Lesson</label>
        <input type="text" class="form-control" id="" name="name" placeholder="Tên bài học"/>
        @if ($errors->has('name'))
        <div class="alert alert-danger">
            {{ $errors->first('name') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="" name="description" placeholder="Mô tả"/>
        @if ($errors->has('description'))
        <div class="alert alert-danger">
            {{ $errors->first('description') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="price">Requirement</label>
        <input type="text" class="form-control" id="" name="requirement" placeholder="Yêu cầu"/>
        @if ($errors->has('requirement'))
        <div class="alert alert-danger">
            {{ $errors->first('requirement') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="time">Time</label>
        <input type="text" class="form-control" id="" name="time" placeholder="Số giờ học"/>
        @if ($errors->has('time'))
        <div class="alert alert-danger">
            {{ $errors->first('time') }}
        </div>
        @endif
    </div>
    <center><button type="submit" class="btn btn-primary" name="btnAdd">Thêm</button></center>
</form>
</div>
@endsection
