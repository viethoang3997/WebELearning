@extends('admin.admin_lte')
@section('title','listtag')
@section('contents')

@if(Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif         
    <center><h2>Danh sách các tag</h2></center>
    <div class="filter-find">
        <div class="d-flex align-items-center">
            <form action="{{ Route('admin.tag.search') }}" method="GET">
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
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php $stt=0; foreach ($tags as $tag): $stt++ ?>
    <tr>
        <td>{{ $stt }}</td>
        <td>{{ $tag['name'] }}</td>
        <td><a href="{{ Route('admin.tags.edit', $tag['id']) }}" class="btn btn-primary">Sửa</a></td>
        <td>
            <form action="{{ Route('admin.tags.destroy', $tag['id']) }}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure ?')">Xóa</button>
            </form>
        </td>     
    </tr>
    <?php endforeach ?>
    </tbody>
    </table> 
    {{ $tags->appends($_GET)->links() }}
@endsection
