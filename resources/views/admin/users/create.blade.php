@extends('admin.admin_lte')
@section('title','listcourse')
@section('contents')
<div class="col-xl-4 col-xl-offset-4 container">
    <center><h2>Thêm User mới</h2></center>
    <form action ="{{ Route('admin.users.store') }}" method="post" enctype="multipart/form-data" id="">
    @csrf 
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="" name="name" placeholder="Tên đăng nhập"/>
        @if ($errors->has('name'))
        <div class="alert alert-danger">
            {{ $errors->first('name') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="" name="email" placeholder="Email"/>
        @if ($errors->has('email'))
        <div class="alert alert-danger">
            {{ $errors->first('email') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="" name="password" placeholder="Password"/>
        @if ($errors->has('password'))
        <div class="alert alert-danger">
            {{ $errors->first('password') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="" name="phone" placeholder="Số điện thoại"/>
        @if ($errors->has('phone'))
        <div class="alert alert-danger">
            {{ $errors->first('phone') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" class="" id="" name="avatar" placeholder="Avatar" />
        @if ($errors->has('avatar'))
        <div class="alert alert-danger">
            {{ $errors->first('avatar') }}
        </div>
        @endif
    </div>
    <div class="form-group">
        <label for="role">Role</label><br>
        <input class="form-check-input ml-2" type="radio" name="role" id="1" value="{{ App\User::ROLE_USER }}" checked>
        <label for="1" class="ml-4">User</label>
        <input class="form-check-input ml-4" type="radio" name="role" id="2" value="{{ App\User::ROLE_TEACHER }}">
        <label for="2" class="ml-5">Teacher</label>
        @if ($errors->has('role'))
        <div class="alert alert-danger">
            {{ $errors->first('role') }}
        </div>
        @endif 
    </div>
    <center><button type="submit" class="btn btn-primary" name="btnAdd">Thêm</button></center>
</form>
</div>
@endsection
