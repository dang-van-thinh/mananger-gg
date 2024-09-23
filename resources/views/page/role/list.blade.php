@extends('layouts.master')
@section('title')
    Quản lý vai trò
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold">Vai trò người dùng</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('role.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="control-label">Tên vai trò</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ old('name') }}" placeholder="Nhập tên vai trò">
                            @error('name')
                                <p class="text-danger badge">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="">
                            <button type="submit" class="btn btn-success px-5">Tạo mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-bordered table">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Tên vai trò</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($data as $key => $role)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $key + 1 }}</th>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center"> <a
                                                    href="{{ route('role.edit', $role->id) }}" class="btn btn-warning"><i
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
        </div>

    </div>
@endsection
