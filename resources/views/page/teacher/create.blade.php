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
                        <label class=" form-control-label">Tên giảng viên</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $teacher->name ?? '')}}" placeholder="Nhập họ tên của giảng viên">
                        </div>
                        <small class="form-text text-danger badge">{{ $errors->first('name') }}</small>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Email</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                            <input type="text" class="form-control" name="email" value="{{ old('email', $teacher->email ?? '')}}" placeholder="Nhập email của giảng viên">
                        </div>
                        <small class="form-text text-danger badge">{{ $errors->first('email') }}</small>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Ngày sinh</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="date" class="form-control" name="birth_day"  value="{{ old('birth_day', $teacher->birth_day ?? '')}}">
                        </div>
                        <small class="form-text text-danger badge">{{ $errors->first('birth_day') }}</small>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Bằng cấp</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-graduation-cap"></i></div>
                            <input type="text" class="form-control" name="degree" value="{{ old('degree', $teacher->degree ?? '')}}" placeholder="Nhập bằng cấp của giảng viên">
                        </div>
                        <small class="form-text text-danger badge">{{ $errors->first('degree') }}</small>
                    </div>
                </div>

                <!-- Cột 2 -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class=" form-control-label">Chuyên môn</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-book"></i></div>
                            <input type="text" class="form-control" name="qualification" value="{{ old('qualification', $teacher->qualification ?? '')}}" placeholder="Nhập chuyên môn của giảng viên">
                        </div>
                        <small class="form-text text-danger badge">{{ $errors->first('qualification') }}</small>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Số điện thoại</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone', $teacher->phone ?? '')}}" placeholder="Nhập số điện thoại của giảng viên">
                        </div>
                        <small class="form-text text-danger badge">{{ $errors->first('phone') }}</small>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Lương theo giờ</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                            <input type="text" class="form-control" name="hourly_rate" value="{{ old('hourly_rate', $teacher->hourly_rate ?? '')}}" placeholder="Nhập lương cho giảng viên">
                        </div>
                        <small class="form-text text-danger badge">{{ $errors->first('hourly_rate') }}</small>
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">Địa chỉ</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                            <input type="text" class="form-control" name="address" value="{{ old('address', $teacher->address ?? '')}}" placeholder="Nhập địa chỉ của giảng viên">
                        </div>
                        <small class="form-text text-danger badge">{{ $errors->first('address') }}</small>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class=" form-control-label">Ảnh</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-picture-o"></i></div>
                    <input class="form-control" type="file" name="image">
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
