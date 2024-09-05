@extends('layouts.master')
@section('title')
    Danh sách giảng viên
@endsection
@section('content')
<div class="card">

<div class="card-header">
    <div>
        <h3 class="d-flex-inline">Danh sách giảng viên</h3>
    </div>
</div>
<div class="d-flex justify-content-end mt-3 me-3">
    <a class="btn btn-success px-4" href="{{ route('teachers.create') }}">
        Thêm mới
    </a>
</div>
<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Họ tên</th>
              <th scope="col">Hình ảnh</th>
              <th scope="col">Email</th>
              <th scope="col">Số điện thoại</th>
              <th scope="col">Ngày sinh</th>
              <th scope="col">Địa chỉ</th>
              <th scope="col">Thông tin chuyên môn</th>
              <th scope="col">Ngày tham gia</th>
              <th width='170px' scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listTeacher as $value)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$value->name}}</td>
                    <td>
                        <img class="width-100 height-100 rounded mx-auto d-block" src="{{'/storage/'.$value->image}}" alt="">
                    </td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->phone}}</td>
                    <td>{{$value->birth_day}}</td>
                    <td>{{$value->address}}</td>
                    <td>{{$value->qualification}}</td>
                    <td>{{$value->enrollment_date}}</td>
                    <td>
                        <form action="{{ route('teachers.destroy', $value->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger " onclick="return confirm('Bạn có chắc muốn xóa không?')">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>
                        <a class="btn btn-warning"  href="{{route('teachers.edit',$value->id)}}">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <button type="button" class="btn btn-info" data-toggle="modal" 
                        data-target="#teacherDetailModal-{{ $value->id }}">
                        <i class="fa fa-info-circle"></i>
                    </button>
                    </td>
                </tr>
                @include('page.teacher.show')
            @endforeach
        </tbody>
    </table>
    {{$listTeacher->links()}}

@endsection
@push('scripts') 
@endpush
