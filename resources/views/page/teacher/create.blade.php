@extends('layouts.master')
@section('title')
    Danh sách giảng viên
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Thêm mới giảng viên</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{route('teachers.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class=" form-control-label">Tên Giảng Viên</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                    <input type="text " class="form-control" name="name">
                </div>
                <small class="form-text text-danger">{{ $errors->first('name') }}</small>
            </div>
            <div class="form-group">
                <label class=" form-control-label">email</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                    <input type="text" class="form-control" name="email">
                </div>
                <small class="form-text text-danger">{{ $errors->first('email') }}</small>
            </div>
            <div class="form-group">
                <label class=" form-control-label">Ảnh</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-picture-o"></i></div>
                    <input class="form-control" type="file" name="image">
                </div>
                <small class="form-text text-danger">{{ $errors->first('image') }}</small>
            </div>
            <div class="form-group">
                <label class=" form-control-label">Ngày sinh</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                    <input type="date" class="form-control" name="birth_day">
                </div>
                <small class="form-text text-danger">{{ $errors->first('birth_day') }}</small>
            </div>
            <div class="form-group">
                <label class=" form-control-label">Bằng Cấp</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-graduation-cap"></i></div>
                    <input type="text" class="form-control" name="degree">
                </div>
                <small class="form-text text-danger">{{ $errors->first('degree') }}</small>
            </div>
            <div class="form-group">
                <label class=" form-control-label">Chuyên Môn</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                    <input type="text" class="form-control" name="qualification">
                </div>
                <small class="form-text text-danger">{{ $errors->first('qualification') }}</small>
            </div>
            <div class="form-group">
                <label class=" form-control-label">Số Điện Thoại</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                    <input type="text" class="form-control" name="phone">
                </div>
                <small class="form-text text-danger">{{ $errors->first('phone') }}</small>
            </div>
            <div class="form-group">
                <label class=" form-control-label">lương Theo Giờ</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                    <input type="text" class="form-control" name="hourly_rate">
                </div>
                <small class="form-text text-danger">{{ $errors->first('hourly_rate') }}</small>
            </div>
            <div class="form-group">
                <label class=" form-control-label">Địa Chỉ</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                    <input type="text" class="form-control" name="address">
                </div>
                <small class="form-text text-danger">{{ $errors->first('address') }}</small>
            </div>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </form>
    </div>
</div>


@endsection
