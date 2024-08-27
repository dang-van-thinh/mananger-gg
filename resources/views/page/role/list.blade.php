@extends('layouts.master')
@section('title')
    Danh sách vai trò
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center ">
                    <strong class="card-title">Vai trò người dùng</strong>
                    <a href="{{ route('role.create') }}" class="btn btn-success btn-sm">Thêm mới</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên vai trò</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $role)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('role.edit', $role->id) }}" class="btn btn-warning "><i
                                                class="fa fa-pencil-square-o"></i></a>
                                        <form action="{{ route('role.destroy', $role->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger ms-2"
                                                onclick="confirm('Có chắc chắn muốn xóa không?')">
                                                <i class="ti-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $data->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
