@extends('layouts.master')
@section('title')
    Sửa ca học
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Sửa ca học</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{route('sessions.update', $session->id)}}" method="post" >
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group">
                    <label class=" form-control-label">Tên ca học</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-tag"></i></div>
                        <input type="text" class="form-control" name="name" value="{{ $session->name }}" placeholder="Nhập tên của ca học">
                    </div>
                    <small class="form-text text-danger badge">{{ $errors->first('name') }}</small>
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Thời gian bắt đầu</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                        <input type="time" class="form-control" name="start_time" value="{{  $session->start_time }}" placeholder="Nhập thời gian bắt đầu ca học">
                    </div>
                    <small class="form-text text-danger badge">{{ $errors->first('start_time') }}</small>
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Thời gian kết thúc</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                        <input type="time" class="form-control" name="end_time" value="{{  $session->end_time }}" placeholder="Nhập thời gian kết thúc ca học">
                    </div>
                    <small class="form-text text-danger badge">{{ $errors->first('end_time') }}</small>
                </div>
            </div>
            <a class="btn btn-warning"  href="{{route('sessions.index')}}">
                Quay lại
            </a>
            <button type="submit" class="btn btn-primary">sửa</button>
            
        </form>
    </div>
</div>
@endsection
