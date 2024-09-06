@extends('layouts.master')
@section('title')
    Chỉnh sửa khóa học
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Chỉnh sửa: {{ $course->name }}</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('course.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name" class="control-label mb-1">Tên khóa học</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-book"></i></div>
                                </div>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ $course->name }}" placeholder="Nhập tên khóa học">
                            </div>
                            @error('name')
                                <p class="text-danger badge">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="price" class="control-label mb-1">Giá khóa học</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-money"></i></div>
                                </div>
                                <input type="number" id="price" name="price" class="form-control"
                                    value="{{ $course->price }}" placeholder="Nhập giá khóa học">
                            </div>
                            @error('price')
                                <p class="text-danger badge">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-actions form-group">
                    <a href="{{ route('course.index') }}" class="btn btn-primary btn-sm">Quay lại</a>
                    <button type="submit" class="btn btn-success btn-sm">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
@endsection
