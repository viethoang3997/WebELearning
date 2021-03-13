@extends('admin.admin_lte')
@section('title','listtag')
@section('contents')
<div class="col-xl-5 col-xl-offset-4 container">
    <center><h2>Chỉnh sửa thông tin của tag</h2></center>
    <form action ="{{ route('admin.tags.update', $tags['id']) }}" method="post"enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" class="form-control" id="" name="id" value="{{ $tags['id'] }}"/>
        <div class="form-group">
            <label for="tensinhvien">Name Tag:</label>
            <input type="text" class="form-control" id="" name="name" value="{{ $tags['name'] }}" placeholder="Tên tag"/>
            @if ($errors->has('name'))
            <div class="alert alert-danger">
                {{ $errors->first('name') }}
            </div>
            @endif
        </div>
        <center><button type="submit" class="btn btn-primary" name="btnEdit">Sửa</button></center>
    </form>
</div>
@endsection
