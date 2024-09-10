@extends('layouts.master')
@section('title')
    Cài đặt
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Cài đặt</strong>
        </div>
        <div class="card-body">
            <!-- Form cập nhật -->
            <form action="{{ route('setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="logo">Logo thương hiệu</label>
                            <div>
                                <input type="file" id="logo" name="logo" class="form-control">
                                <img src="{{ '/Storage/' . $setting->logo }}" alt="" width="100px">
                            </div>
                            @error('logo')
                                <p class="text-danger badge">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="logo_tab">Biểu tượng trang web</label>
                            <div>
                                <input type="file" id="logo_tab" name="logo_tab" class="form-control">
                                <img src="{{ '/Storage/' . $setting->logo_tab }}" alt="" width="100px">
                            </div>
                            @error('logo_tab')
                                <p class="text-danger badge">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- Nút Lưu thay đổi -->
                <button type="submit" class="btn btn-success">Lưu thay đổi</button>
            </form>

            <!-- Form xóa -->
            {{-- <form action="{{ route('setting.delete', $setting->id) }}" method="post" style="margin-top: 20px;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Chắc chắn muốn xoá không?')">Xóa tất
                    cả</button>
            </form> --}}
        </div>
    </div>
@endsection
