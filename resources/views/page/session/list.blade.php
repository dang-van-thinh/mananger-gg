@extends('layouts.master')
@section('title')
    Danh sách giảng viên
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Thêm mới ca học</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{route('sessions.store')}}" method="post" >
            @csrf
            <div class="row">
                <div class="col col-4">
                    <label class=" form-control-label">Tên ca học</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-tag"></i></div>
                        <input type="text" class="form-control" name="name" value="{{ old('name')}}" placeholder="Nhập tên của ca học">
                    </div>
                    <small class="form-text text-danger badge">{{ $errors->first('name') }}</small>
                </div>
                <div class="col col-4">
                    <label class=" form-control-label">Thời gian bắt đầu</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                        <input type="time" class="form-control" name="start_time" value="{{ old('start_time')}}" placeholder="Nhập thời gian bắt đầu ca học">
                    </div>
                    <small class="form-text text-danger badge">{{ $errors->first('start_time') }}</small>
                </div>
                <div class="col col-4">
                    <label class=" form-control-label">Thời gian kết thúc</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                        <input type="time" class="form-control" name="end_time" value="{{ old('end_time')}}" placeholder="Nhập thời gian kết thúc ca học">
                    </div>
                    <small class="form-text text-danger badge">{{ $errors->first('end_time') }}</small>
                </div>   
            </div>
            <div class="d-flex justify-content-end mt-2">
                <button type="submit" class="btn btn-success px-5">Thêm mới</button>    
            </div>  
        </form>
    </div>
</div>

<div class="card">
<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tên ca học</th>
              <th scope="col">Giờ bắt đầu</th>
              <th scope="col">Giờ kết thúc</th>
              
              <th width='170px' scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listSession as $value)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$value->name}}</td>
                    <td>{{ date('H:i', strtotime($value->start_time)) }}</td>
                    <td>{{ date('H:i', strtotime($value->end_time)) }}</td>
                    <td>
                        <form action="{{ route('sessions.destroy', $value->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger " onclick="return confirm('Bạn có chắc muốn xóa không?')">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>
                        <a class="btn btn-warning"  href="{{route('sessions.edit',$value->id)}}">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <button type="button" class="btn btn-info" data-toggle="modal" 
                            data-target="#sessionDetailModal-{{ $value->id }}">
                            <i class="fa fa-info-circle"></i>
                        </button>
                    </td>
                </tr>
                @include('page.session.show')
            @endforeach
        </tbody>
    </table>
    {{$listSession->links()}}
 

@endsection
@push('scripts') 
@endpush
