@extends('layouts.master')
@section('title')
    Thêm mới phòng học
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Thêm mới phòng học</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{route('rooms.store')}}" method="post" >
            @csrf
            <div class="row">
                <div class="form-group">
                    <label class=" form-control-label">Tên phòng học</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-home"></i></div>
                        <input type="text" class="form-control" name="name" value="{{ old('name')}}" placeholder="Nhập tên của phòng học">
                    </div>
                    <small class="form-text text-danger badge">{{ $errors->first('name') }}</small>
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Sức chứa</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-users"></i></div>
                        <input type="text" class="form-control" name="capacity" value="{{ old('capacity')}}" placeholder="Nhập sức chứa của phòng học">
                    </div>
                    <small class="form-text text-danger badge">{{ $errors->first('capacity') }}</small>
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Mổ tả vị trí phòng</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-thumb-tack"></i></div>
                        <input type="text" class="form-control" name="location" value="{{ old('location')}}" placeholder="Nhập mô tả vị trí của phòng học">
                    </div>
                    <small class="form-text text-danger badge">{{ $errors->first('location') }}</small>
                </div>
            </div>
            <a class="btn btn-warning"  href="{{route('rooms.index')}}">
                Quay lại
            </a>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
            
        </form>
    </div>
</div>
@endsection
