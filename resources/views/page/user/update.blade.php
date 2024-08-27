@extends('layouts.master')
@section('title')
    Chỉnh sửa: {{ $user->name }}
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <strong class="card-title"> Chỉnh sửa: {{ $user->name }}</strong>
        </div>
        <div class="card-body">
            <div>
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Họ và tên</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" id="name" name="name" class="form-control"
                                            value="{{ $user->name }}">
                                    </div>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image" class="control-label mb-1">Ảnh </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-image"></i></div>
                                        <input type="file" id="image" name="image" class="form-control">
                                    </div>
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <img src="{{ \Storage::url($user->image) }}" width="100px">
                                </div>

                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">Email *</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input type="email" id="email" name="email" class="form-control"
                                            value="{{ $user->email }}">
                                    </div>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone" class="control-label mb-1">Số điện thoại</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input type="text" id="phone" name="phone" class="form-control"
                                            value="{{ $user->phone }}">
                                    </div>
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password" class="control-label mb-1">Mật khẩu</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                        <input type="password" id="password" name="password" class="form-control"
                                            value="{{ $user->password }}">
                                    </div>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="role_id" class="control-label mb-1">Vai trò</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-id-card"></i></div>
                                        <select name="role_id" id="role_id" class="form-control">
                                            @foreach ($role as $id => $name)
                                                <option @if ($user->id) selected @endif value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="active" class="control-label mb-1">Trạng thái</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></div>
                                        <select name="active" id="active" class="form-control">
                                            <option value="1" @if ($user->active == 1) selected @endif>Hoạt động</option>
                                            <option value="0" @if ($user->active == 0) selected @endif>Ngưng hoạt động</option>
                                        </select>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="form-actions form-group">
                            <a href="{{ route('user.index') }}" type="submit" class="btn btn-primary btn-sm">Quay lại</a>
                            <button type="submit" class="btn btn-success btn-sm">Cập nhật</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
