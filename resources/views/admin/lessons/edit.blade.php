@extends('admin.admin_lte')
@section('title','listlesson')
@section('contents')
<div class="col-xl-5 col-xl-offset-4 container">
    <center><h2>Chỉnh sửa thông tin bài học</h2></center>
    <form action ="{{ route('admin.lessons.update', ['courseId' => $courseId, 'lesson' => $lessonId]) }}" method="post"enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" class="form-control" id="" name="id" value="{{ $lessons['id'] }}"/>
        <div class="form-group">
            <label for="tensinhvien">Name Lesson:</label>
            <input type="text" class="form-control" id="" name="name" value="{{ $lessons['name'] }}" placeholder="Tên bài học"/>
            @if ($errors->has('name'))
            <div class="alert alert-danger">
                {{ $errors->first('name') }}
            </div>
            @endif
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" cols="60" rows="3">{{ $lessons['description'] }}</textarea>
            @if ($errors->has('description'))
            <div class="alert alert-danger">
                {{ $errors->first('description') }}
            </div>
            @endif
        </div>
        <div class="form-group">
            <label for="price">Requirement:</label>
            <input type="text" class="form-control" id="" name="requirement" value="{{ $lessons['requirement'] }}" placeholder="Yêu cầu"/>
            @if ($errors->has('requirement'))
            <div class="alert alert-danger">
                {{ $errors->first('requirement') }}
            </div>
            @endif
        </div>
        <div class="form-group">
            <label for="time">Time:</label>
            <input type="text" class="form-control" id="" name="requirement" value="{{ $lessons['time'] }}" placeholder="Yêu cầu"/>
            @if ($errors->has('time'))
            <div class="alert alert-danger">
                {{ $errors->first('time') }}
            </div>
            @endif
        </div>
        <center><button type="submit" class="btn btn-primary" name="btnEdit">Sửa</button></center>
    </form>
</div>
@endsection
