@extends('admin.admin_lte')
@section('title','listuser')
@section('contents')
@if(Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif         
    <center><h2>Danh sách User</h2></center>
    <div class="filter-find">
        <div class="d-flex align-items-center">
            <form action="{{ Route('admin.user.search') }}" method="GET">
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
            <th>Email</th>
            <th>Phone</th>
            <th>Avatar</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php $stt=0; foreach ($users as $user): $stt++ ?>
    <tr>
        <td>{{ $stt }}</td>
        <td>{{ $user['name'] }}</td>
        <td>{{ $user['email'] }}</td>
        <td>{{ $user['phone'] }}</td>
        <td>{{ $user['avatar'] }}</td>
        <td>{{ ($user['role_id'] == 1) ? 'Student' : 'Teacher' }}</td>
        <td><a href="{{ Route('admin.users.edit', $user['id']) }}" class="btn btn-primary">Sửa</a></td>
        <td>
            <form action="{{ Route('admin.users.destroy', $user['id']) }}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure ?')">Xóa</button>
            </form>
        </td>     
    </tr>
    <?php endforeach ?>
    </tbody>
    </table> 
    {{ $users->appends($_GET)->links() }}
@endsection
