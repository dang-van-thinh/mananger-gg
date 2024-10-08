@extends('layouts.master')
@section('title')
    Thêm mới người dùng
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Thêm mới người dùng</strong>
        </div>
        <div class="card-body">
            <div>
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Họ và tên</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" id="name" name="name" class="form-control"
                                            value="{{ old('name') }}" placeholder="Nhập họ và tên của người dùng">
                                    </div>
                                    @error('name')
                                        <p class="text-danger badge">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image" class="control-label mb-1">Ảnh</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-image"></i></div>
                                        <input type="file" id="image" name="image" class="form-control">
                                    </div>
                                    @error('image')
                                        <p class="text-danger badge">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input type="email" id="email" name="email" class="form-control"
                                            value="{{ old('email') }}" placeholder="Nhập email của người dùng">
                                    </div>
                                    @error('email')
                                        <p class="text-danger badge">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone" class="control-label mb-1">Số điện thoại</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input type="text" id="phone" name="phone" class="form-control"
                                            value="{{ old('phone') }}" placeholder="Nhập số điện thoại của người dùng">
                                    </div>
                                    @error('phone')
                                        <p class="text-danger badge">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class="control-label mb-1">Mật khẩu</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                        <input type="password" id="password" name="password" class="form-control"
                                            value="{{ old('password') }}" placeholder="Nhập mật khẩu của người dùng">
                                    </div>
                                    @error('password')
                                        <p class="text-danger badge">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="role_id" class="control-label mb-1">Vai trò</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-id-card"></i></div>
                                        <select name="role_id" id="role_id" class="form-control">
                                            @foreach ($data as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('role_id')
                                        <p class="text-danger badge">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="form-actions form-group">
                            <a href="{{ route('user.index') }}" type="submit" class="btn btn-primary btn-sm">Quay lại</a>
                            <button type="submit" class="btn btn-success btn-sm">Tạo mới</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
