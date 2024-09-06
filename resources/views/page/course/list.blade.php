@extends('layouts.master')
@section('title')
    Danh sách Khóa học
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Danh sách Khóa học</h4>
        </div>
        <div class="text-end mt-3 mx-3">
            <a href=""></a>
            <a href="{{ route('course.create') }}" class="btn btn-success">Thêm mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Tên khóa học</th>
                            <th scope="col">Giá khóa học</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
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
@endsection
