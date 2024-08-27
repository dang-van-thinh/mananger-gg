@extends('layouts.master')
@section('title')
    Chỉnh sửa: {{ $role->name }}
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Chỉnh sửa vai trò</strong>
        </div>
        <div class="card-body">
            <div>
                <div class="card-body">
                    <form action="{{ route('role.update', $role) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="control-label mb-1">Tên vai trò *</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ $role->name }}">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-actions form-group">
                            <a href="{{ route('role.index') }}" type="submit" class="btn btn-primary btn-sm">Quay lại</a>
                            <button type="submit" class="btn btn-success btn-sm">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
