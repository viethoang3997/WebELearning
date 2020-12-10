@extends('admin.admin_lte')
@section('title','listcourse')
@section('contents')
<div class="col-xl-5 col-xl-offset-4 container">
    <center><h2>Chỉnh sửa thông tin khóa học</h2></center>
    <form action ="{{ route('admin.courses.update', $courses['id']) }}" method="post"enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" class="form-control" id="" name="id" value="{{ $courses['id'] }}"/>
        <div class="form-group">
            <label for="tensinhvien">Name Course:</label>
            <input type="text" class="form-control" id="" name="name" value="{{ $courses['name'] }}" placeholder="Tên khóa học"/>
            @if ($errors->has('name'))
            <div class="alert alert-danger">
                {{ $errors->first('name') }}
            </div>
            @endif
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" name="image"/><br>
            <img class="img-preview" src="{{ asset($courses['image']) }}" alt="" width="100px">
            @if ($errors->has('image'))
                <div class="alert alert-danger">
                    {{ $errors->first('image') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" cols="60" rows="3">{{ $courses['description'] }}</textarea>
            @if ($errors->has('description'))
            <div class="alert alert-danger">
                {{ $errors->first('description') }}
            </div>
            @endif
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" id="" name="price" value="{{ $courses['price'] }}" placeholder="Giá"/>
            @if ($errors->has('price'))
            <div class="alert alert-danger">
                {{ $errors->first('price') }}
            </div>
            @endif
        </div>
        <center><button type="submit" class="btn btn-primary" name="btnEdit">Sửa</button></center>
    </form>
</div>
@endsection
