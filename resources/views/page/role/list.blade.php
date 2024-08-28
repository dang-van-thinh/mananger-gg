@extends('layouts.master')
@section('title')
    Danh sách vai trò
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Vai trò người dùng</h4>
        </div>
        <div class="text-end mt-3 mx-3">
            <a href=""></a>
            <a href="{{ route('role.create') }}" class="btn btn-success">Thêm mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Tên vai trò</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $role)
                            <tr>
                                <th scope="row" class="text-center">{{ $key + 1 }}</th>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <div class="d-flex justify-content-center"> <a
                                            href="{{ route('role.edit', $role->id) }}" class="btn btn-warning "><i
                                                class="fa fa-pencil-square-o"></i></a>
                                        <form action="{{ route('role.destroy', $role->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger ms-2"
                                                onclick="confirm('Có chắc chắn muốn xóa không?')">
                                                <i class="ti-trash"></i>
                                            </button>
                                    </div>
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

@endsection
