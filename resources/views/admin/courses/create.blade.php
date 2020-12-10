@extends('admin.admin_lte')
@section('title','listcourse')
@section('contents')
<div class="col-xl-4 col-xl-offset-4 container">
    <center><h2>Thêm khóa học mới</h2></center>
    <form action ="{{ Route('admin.courses.store') }}" method="post" enctype="multipart/form-data" id="">
    @csrf 
    <div class="form-group">
        <label for="name">Name Course</label>
        <input type="text" class="form-control" id="" name="name" placeholder="Tên khóa học"/>
        @if ($errors->has('name'))
        <div class="alert alert-danger">
            {{ $errors->first('name') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="" name="image"/>
        @if ($errors->has('image'))
        <div class="alert alert-danger">
            {{ $errors->first('image') }}
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
        <label for="price">Price</label>
        <input type="text" class="form-control" id="" name="price" placeholder="Giá"/>
        @if ($errors->has('price'))
        <div class="alert alert-danger">
            {{ $errors->first('price') }}
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
