@extends('layouts.master')
@section('title')
    Danh sách giảng viên
@endsection
@section('content')
<a class="btn btn-success" href="{{route('teachers.create')}}">thêm</a>
<div class="crad-header">
    <strong class="card-title">Danh sách giảng viên</strong>
</div>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Họ Tên</th>
              <th scope="col">Hình Ảnh</th>
              <th scope="col">Email</th>
              <th scope="col">Số Điện Thoại</th>
              <th scope="col">Ngày Sinh</th>
              <th scope="col">Địa chỉ</th>
              <th scope="col">Thông Tin Chuyên Môn</th>
              <th scope="col">Bằng Cấp</th>
              <th scope="col">Lương Theo Giờ</th>
              <th scope="col">Ngày Tham Gia</th>
              <th scope="col">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listTeacher as $value)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$value->name}}</td>
                    <td><img style="width:70px" src="{{ asset('imageTeacher/'.$value->image) }}" alt=""></td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->phone}}</td>
                    <td>{{$value->birth_day}}</td>
                    <td>{{$value->address}}</td>
                    <td>{{$value->qualification}}</td>
                    <td>{{$value->degree}}</td>
                    <td>{{$value->hourly_rate}}</td>
                    <td>{{$value->enrollment_date}}</td>
                    <td>
                        <form action="{{ route('teachers.destroy', $value->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không?')">Xóa</button>
                        </form>
                        <a class="btn btn-warning"  href="{{route('teachers.edit',$value->id)}}">sửa</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $listTeacher->links('pagination::bootstrap-5') }}
</div>

@endsection
