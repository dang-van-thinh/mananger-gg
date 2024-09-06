@extends('layouts.master')
@section('title')
    Danh sách học viên
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="fs-4">Danh sách học viên</h3>
        </div>
        <div class="d-flex justify-content-end mx-3 mt-4">
            <a href="{{ route('students.create') }}" class="btn btn-success me-2 px-4">
                Thêm mới
            </a>
        </div>
        <div class="card-body">
            <table class="table-bordered table">
                <thead>
                    <tr>
                        <th width="40px">#</th>
                        <th>Tên học viên</th>
                        <th>Email</th>
                        <th width="150px">Ảnh</th>
                        <th>Số điện thoại</th>
                        <th width="150px">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $key => $student)
                        <tr>
                            <th>{{ $key + '1' }} </th>
                            <th> {{ $student->name }} </th>
                            <td>{{ $student->email }}</td>
                            <td>
                                <img src="{{ '/storage/' . $student->image }}"alt="" width="100px" height="100px"
                                    class="d-block mx-auto rounded">
                            </td>
                            <td>{{ $student->phone }}</td>
                            <td class="d-flex">
                                <div class="me-2">
                                    <form action="{{ route('students.destroy', $student->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Bạn có chắc muốn xóa học viên này ?')">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="me-2">
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#studentDetailModal-{{ $student->id }}">
                                        <i class="fa fa-info-circle"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @include('page.student.show')
                    @endforeach

                </tbody>
            </table>

            {{ $students->links() }}
        </div>
    </div>
@endsection
