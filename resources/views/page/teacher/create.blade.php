@extends('layouts.master')
@section('title')
    Thêm mới giảng viên
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Thêm mới giảng viên</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{route('teachers.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Cột 1 -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class=" form-control-label">Tên Giảng Viên</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="text" class="form-control" name="name" placeholder="Nhập họ tên của giảng viên">
                        </div>
                        <small class="form-text text-danger badge">{{ $errors->first('name') }}</small>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Email</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                            <input type="text" class="form-control" name="email" placeholder="Nhập email của giảng viên">
                        </div>
                        <small class="form-text text-danger badge">{{ $errors->first('email') }}</small>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Ngày sinh</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="date" class="form-control" name="birth_day" >
                        </div>
                        <small class="form-text text-danger badge">{{ $errors->first('birth_day') }}</small>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Bằng Cấp</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-graduation-cap"></i></div>
                            <input type="text" class="form-control" name="degree" placeholder="Nhập bằng cấp của giảng viên">
                        </div>
                        <small class="form-text text-danger badge">{{ $errors->first('degree') }}</small>
                    </div>
                </div>

                <!-- Cột 2 -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class=" form-control-label">Chuyên Môn</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-book"></i></div>
                            <input type="text" class="form-control" name="qualification" placeholder="Nhập chuyên môn của giảng viên">
                        </div>
                        <small class="form-text text-danger badge">{{ $errors->first('qualification') }}</small>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Số Điện Thoại</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                            <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại của giảng viên">
                        </div>
                        <small class="form-text text-danger badge">{{ $errors->first('phone') }}</small>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Lương Theo Giờ</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                            <input type="text" class="form-control" name="hourly_rate" placeholder="Nhập lương cho giảng viên">
                        </div>
                        <small class="form-text text-danger badge">{{ $errors->first('hourly_rate') }}</small>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Địa Chỉ</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                            <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ của giảng viên">
                        </div>
                        <small class="form-text text-danger badge">{{ $errors->first('address') }}</small>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class=" form-control-label">Ảnh</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-picture-o"></i></div>
                    <input class="form-control" type="file" name="image" >
                </div>
                <small class="form-text text-danger badge">{{ $errors->first('image') }}</small>
            </div>
            <a class="btn btn-warning"  href="{{route('teachers.index')}}">
                Quay lại
            </a>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
            
        </form>
    </div>
</div>
@endsection
