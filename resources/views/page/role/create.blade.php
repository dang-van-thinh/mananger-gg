@extends('layouts.master')
@section('title')
    Thêm mới vai trò
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Thêm mới vai trò</strong>
        </div>
        <div class="card-body">
            <div>
                <div class="card-body">
                    <form action="{{ route('role.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="control-label mb-1">Tên vai trò</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ old('name') }}" placeholder="Nhập tên vai trò">
                            @error('name')
                                <p class="text-danger badge">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-actions form-group">
                            <a href="{{ route('role.index') }}" type="submit" class="btn btn-primary btn-sm">Quay lại</a>
                            <button type="submit" class="btn btn-success btn-sm">Tạo mới</button>
                        </div>

                </div>
                </form>
            </div>
        </div>

    </div>
@endsection
