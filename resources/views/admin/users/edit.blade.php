@extends('admin.admin_lte')
@section('title','edituser')
@section('contents')
<div class="col-xl-5 col-xl-offset-4 container">
    <center><h2>Chỉnh sửa thông tin User</h2></center>
    <form action ="{{ route('admin.users.update', $users['id']) }}" method="post"enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" class="form-control" name="id" value="{{ $users['id'] }}"/>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{ $users['name'] }}" placeholder="Tên user"/>
            @if ($errors->has('name'))
            <div class="alert alert-danger">
                {{ $errors->first('name') }}
            </div>
            @endif
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" value="{{ $users['email'] }}" placeholder="Email"/><br>
            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" value="" placeholder="Password"/><br>
            @if ($errors->has('password'))
                <div class="alert alert-danger">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" name="phone" value="{{ $users['phone'] }}"/>
            @if ($errors->has('phone'))
            <div class="alert alert-danger">
                {{ $errors->first('phone') }}
            </div>
            @endif
        </div>
        <div class="form-group">
            <label for="avatar">Avatar</label>
            <input type="file" name="avatar"/><br>
            <img class="img-preview" src="{{ asset('./storage/avatar/'.$users['avatar']) }}" alt="" width="150px">
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
        <center><button type="submit" class="btn btn-primary" name="btnEdit">Sửa</button></center>
    </form>
</div>
@endsection
