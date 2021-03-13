@extends('admin.admin_lte')
@section('title','listtag')
@section('contents')
<div class="col-xl-4 col-xl-offset-4 container">
    <center><h2>Thêm tag mới</h2></center>
    <form action ="{{ Route('admin.tags.store') }}" method="post" enctype="multipart/form-data" id="">
    @csrf 
    <div class="form-group">
        <label for="name">Name Tag</label>
        <input type="text" class="form-control" id="" name="name" placeholder="Tên tag"/>
        @if ($errors->has('name'))
        <div class="alert alert-danger">
            {{ $errors->first('name') }}
        </div>
        @endif
    </div>
    <center><button type="submit" class="btn btn-primary" name="btnAdd">Thêm</button></center>
</form>
</div>
@endsection
