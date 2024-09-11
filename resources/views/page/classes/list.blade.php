@extends('layouts.master')
@section('title')
    Danh sách lớp học
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="fs-4">Danh sách lớp học</h3>
        </div>
        <div class="d-flex justify-content-end mx-3 mt-4">
            <a href="{{ route('classes.create') }}" class="btn btn-success me-2 px-4">
                Thêm mới
            </a>
        </div>
        <div class="card-body">
            <table class="table-bordered table-hover table">
                <thead>
                    <tr>
                        <th width="40px">#</th>
                        <th>Tên lớp</th>
                        <th>Khóa học</th>
                        <th width="10%">Phòng học</th>
                        <th>Giáo viên</th>
                        <th width="10%">Ngày bắt đầu</th>
                        <th width="10%">Ngày kết thúc</th>

                        <th width="150px">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $key => $class)
                        <tr>
                            <td>{{ $key + '1' }} </td>
                            <td> {{ $class->name }} </td>
                            <td>{{ $class->course->name }}</td>
                            <td>{{ $class->room->name }}</td>
                            <td>{{ $class->teacher->name }}</td>
                            <td> {{ $class->start_date }} </td>
                            <td> {{ $class->end_date }} </td>

                            <td class="d-flex">
                                <div class="me-2">
                                    <form action="{{ route('classes.destroy', $class->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Bạn có chắc muốn xóa lớp học này ?')">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="me-2">
                                    <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-warning">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#classDetailModal-{{ $class->id }}">
                                        <i class="fa fa-info-circle"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @include('page.classes.show')
                    @endforeach

                </tbody>
            </table>

            {{ $classes->links() }}
        </div>
    </div>
@endsection
