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
            <form action="{{ route('settings.updateLogo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="logo">Logo thương hiệu</label>
                            <div>
                                <div>
                                    <input type="file" id="logo" name="logo" class="form-control mb-1">
                                    <img src="{{ '/Storage/' . $settingLogo->value }}" alt="Logo thương hiệu">
                                </div>
                                @error('logo')
                                    <p class="text-danger badge">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="logo_tab">Biểu tượng trang web</label>
                            <div>
                                <div>
                                    <input type="file" id="logo_tab" name="logo_tab" class="form-control mb-1">
                                    <img src="{{ '/Storage/' . $settingLogoTab->value }}" alt="Biểu tượng trang web"
                                        width="100px">
                                </div>
                                @error('logo_tab')
                                    <p class="text-danger badge">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h3>Chú ý</h3><br>
                        <small>- Kích thước Logo không được vượt quá 2MB, có kích thước chính xác 145x40 pixel.</small>
                        <br><br>
                        <small>- Kích thước Biểu tượng website không được vượt quá 512KB,có kích thước trong khoảng từ 16x16
                            đến 512x512 pixel và có tỷ lệ 1:1</small>
                    </div>
                </div>
                <!-- Nút Lưu thay đổi -->
                <button type="submit" class="btn btn-success">Lưu thay đổi</button>
            </form>

        </div>
    </div>
@endsection
