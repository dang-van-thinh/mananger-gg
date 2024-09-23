@extends('layouts.master')
@section('title')
    Danh sách Khóa học
@endsection
@section('content')
    <div class="card my-2">
        <div class="card-header">
            <strong class="card-title">Quản lý khóa học</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('course.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name" class="control-label mb-1">Tên khóa học</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-book"></i></div>
                                </div>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ old('name') }}" placeholder="Nhập tên khóa học">
                            </div>
                            <div class="">
                                @error('name')
                                    <p class="text-danger badge">{{ $message }}</p>
                                @enderror
                            </div>
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
                                    value="{{ old('price') }}" placeholder="Nhập giá khóa học">
                            </div>
                            @error('price')
                                <small class="text-danger badge">{{ $message }}</small>
                            @enderror
                        </div>
                        
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success px-5 mb-3">Tạo mới</button>
                </div>

            </form>
            <div class="table-responsive">
                <table class="table-bordered table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Tên khóa học</th>
                            <th scope="col">Giá khóa học</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($data as $key => $course)
                            <tr>
                                <th scope="row" class="text-center">{{ $key + 1 }}</th>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->price }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <div class="mr-1">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#courseDetailModal-{{ $course->id }}">
                                                <i class="fa fa-info-circle"></i>
                                            </button>
                                        </div>

                                        <div class="mr-1">
                                            <a href="{{ route('course.edit', $course->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                        </div>

                                        <div>
                                            <form action="{{ route('course.destroy', $course->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Có chắc chắn muốn xóa không?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                            @include('page.course.show')
                        @endforeach

                    </tbody>
                </table>

                {{ $data->links() }}
            </div>
        </div>
    </div>
    {{-- <div class="card">
        <div class="card-body">

        </div>

    </div> --}}
@endsection
