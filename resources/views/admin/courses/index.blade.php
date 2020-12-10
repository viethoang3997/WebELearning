@extends('admin.admin_lte')
@section('title','listcourse')
@section('contents')

@if(Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif         
    <center><h2>Danh sách khoá học</h2></center>
    <div class="filter-find">
        <div class="d-flex align-items-center">
            <form action="{{ Route('admin.course.search') }}" method="GET">
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
            <th>Image</th>
            <th>Description</th>
            <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php $stt=0; foreach ($courses as $course): $stt++ ?>
    <tr>
        <td>{{ $stt }}</td>
        <td>{{ $course['name'] }}</td>
        <td><img src="{{ asset('./storage/image/'.$course['image']) }}" width="100px"></td>
        <td>{{ $course['description'] }}</td>
        <td>{{ $course['price'] }}</td>
        <td><a href="{{ Route('admin.courses.edit', $course['id']) }}" class="btn btn-primary">Sửa</a></td>
        <td>
            <form action="{{ Route('admin.courses.destroy', $course['id']) }}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure ?')">Xóa</button>
            </form>
        </td>     
    </tr>
    <?php endforeach ?>
    </tbody>
    </table> 
    {{ $courses->appends($_GET)->links() }}
@endsection
