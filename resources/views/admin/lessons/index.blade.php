@extends('admin.admin_lte')
@section('title','listlesson')
@section('contents')

@if(Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif         
    <center><h2>Danh sách bài học {{ $courseName }}</h2></center>
    <div class="filter-find">
        <div class="d-flex align-items-center">
            <form action="{{ Route('admin.lessons.search') }}" method="GET">
                <div class="input-group">
                    <input type="text" placeholder="Search..." class="find-input mb-3" name="search" value="{{ request('search') }}">
                    <i class="fas fa-search search-icon"></i>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-striped" border="1">
    <thead>
        <tr>
            <th>STT</th>
            <th>Name </th>
            <th>Description</th>
            <th>Requirement</th>
            <th>Time</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php $stt=0; foreach ($lessons as $lesson): $stt++ ?>
    <tr>
        <td>{{ $stt }}</td>
        <td>{{ $lesson['name'] }}</td>
        <td>{{ $lesson['description'] }}</td>
        <td>{{ $lesson['requirement'] }}</td>
        <td>{{ $lesson['time'] }}</td>
        <td><a href="{{ Route('admin.lessons.edit', [ 'courseId' => $courseId, 'lesson' => $lesson->id]) }}" class="btn btn-primary">Sửa</a></td>
        <td>
            <form action="{{ Route('admin.lessons.destroy', [ 'courseId' => $courseId, 'lesson' => $lesson->id]) }}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure ?')">Xóa</button>
            </form>
        </td>     
    </tr>
    <?php endforeach ?>
    </tbody>
    </table> 
    {{ $lessons->appends($_GET)->links() }}
    <div class="col-xs-4 ml-4">
        <a href="{{ Route('admin.lessons.create')."?courseId=".$courseId }}" class="btn btn-danger">Thêm bài học</a>
    </div>
@endsection
