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
                        <a class="btn btn-info" href="#" data-bs-toggle="modal" data-bs-target="#detailModel" data-bs-name="{{$value->name}}"  data-bs-email="{{$value->email}}"  data-bs-phone="{{$value->phone}}"  data-bs-birth_day="{{$value->birth_day}}" data-bs-address="{{$value->address}}" data-bs-qualification="{{$value->qualification}}" data-bs-enrollment_date="{{$value->enrollment_date}}" data-bs-hourly_rate="{{$value->hourly_rate}}"  data-bs-degree="{{$value->degree}}" data-bs-image="{{$value->image}}" id="myButton"> 
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$listTeacher->links()}}
@include('page.teacher.teacher-list-modal')
@endsection
@push('scripts') 
<script>
    var detailModel = document.getElementById('detailModel');
    detailModel.addEventListener('show.bs.modal', function (event) {
        var button = document.getElementById('myButton');
        var image = button.getAttribute('data-bs-image');
        document.querySelector('input[name="name"]').value =  button.getAttribute('data-bs-name') ;
        document.querySelector('input[name="email"]').value = button.getAttribute('data-bs-email') ;
        document.querySelector('input[name="birth_day"]').value = button.getAttribute('data-bs-birth_day') ;
        document.querySelector('input[name="degree"]').value = degree = button.getAttribute('data-bs-degree') ;
        document.querySelector('input[name="qualification"]').value = degree = button.getAttribute('data-bs-qualification');
        document.querySelector('input[name="phone"]').value = degree = button.getAttribute('data-bs-phone') ;
        document.querySelector('input[name="hourly_rate"]').value = degree = button.getAttribute('data-bs-hourly_rate') ;
        document.querySelector('input[name="address"]').value = degree = button.getAttribute('data-bs-address') ;
        document.getElementById('teacherImage').src = 'storage/' + image;

    });
</script>
@endpush
