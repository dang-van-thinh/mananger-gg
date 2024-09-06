@extends('layouts.master')
@section('title')
    Tạo mới học viên
@endsection
@section('content')
    <div class="card">
        <h3 class="card-header text-center">Thêm mới học viên</h3>
        <div class="p-4">
            <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name" class="form-label"> Họ và tên </label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ old('name') }}" placeholder="Nhập họ và tên học viên">
                            </div>
                            @if ($errors->has('name'))
                                <div class="form-text badge text-danger">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ old('email') }}" placeholder="Nhập email học viên ">
                            </div>
                            @if ($errors->has('email'))
                                <div class="form-text badge text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="birth_day" class="form-label">Ngày sinh</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar-o" aria-hidden="true"></i></div>
                                <input type="date" name="birth_day" class="form-control" value="{{ old('birth_day') }}"
                                    id="birth_day">
                            </div>
                            @if ($errors->has('birth_day'))
                                <div class="form-text badge text-danger">
                                    {{ $errors->first('birth_day') }}
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                <input type="text" name="address" class="form-control" id="address"
                                    value="{{ old('address') }}" placeholder="Nhập địa chỉ của học viên ">
                            </div>
                            @if ($errors->has('address'))
                                <div class="form-text badge text-danger">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                <input type="text" name="phone" class="form-control" id="phone"
                                    value="{{ old('phone') }}" placeholder="Nhập số điện thoại của học viên ">
                            </div>

                            @if ($errors->has('phone'))
                                <div class="form-text badge text-danger">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-label">Ảnh học viên</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
                                <input type="file" id="image" class="form-control" name="image">
                            </div>

                            @if ($errors->has('image'))
                                <div class="form-text badge text-danger">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-info" href="{{ route('students.index') }}">Quay lại</a>
                        <button type="submit" class="btn btn-primary px-5">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
