@extends('layouts.master')
@section('title')
    Danh sách người dùng
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Danh sách người dùng</h4>
        </div>
        <div class="text-end mt-3 mx-2">
            <a href=""></a>
            <a href="{{ route('user.create') }}" class="btn btn-success btn-sm">Thêm mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th class="avatar">Ảnh</th>
                            <th scope="col">Tên người dùng</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Vai trò</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col" class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $user)
                            <tr>
                                <td class="serial">{{ $key + 1 }}</td>
                                <td class="avatar">
                                    <div class="round-img">
                                        <img class="rounded" src="{{ Storage::url($user->image) }}" alt="user image" width="50" height="50">
                                    </div>
                                </td>
                                <td><small>{{ $user->name }}</small></td>
                                <td><small>{{ $user->email }}</small></td>
                                <td><small>{{ $user->phone }}</small></td>
                                <td><small>{{ $user->role->name }}</small></td>
                                <td>
                                    @if ($user->active == 1)
                                        <span class="badge badge-success">Hoạt động</span>
                                    @else
                                        <span class="badge badge-secondary">Ngưng hoạt động</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="mr-1">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                                                <i class="fa fa-info-circle"></i>
                                            </button>
                                        </div>
                                        <div class="mr-1">
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                        </div>
                                        <div>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Có chắc chắn muốn xóa không?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>                                
                            </tr>
                        @endforeach
        
                    </tbody>
                </table>
            </div> <!-- /.table-responsive -->
        </div>
        
    @endsection
