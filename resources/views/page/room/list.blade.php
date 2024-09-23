@extends('layouts.master')
@section('title')
    Danh sách phòng học
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
                <div class="col col-4">
                    <label class=" form-control-label">Tên phòng học</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-home"></i></div>
                        <input type="text" class="form-control" name="name" value="{{ old('name')}}" placeholder="Nhập tên của phòng học">
                    </div>
                    <small class="form-text text-danger badge">{{ $errors->first('name') }}</small>
                </div>
                <div class="col col-4">
                    <label class=" form-control-label">Sức chứa</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-users"></i></div>
                        <input type="text" class="form-control" name="capacity" value="{{ old('capacity')}}" placeholder="Nhập sức chứa của phòng học">
                    </div>
                    <small class="form-text text-danger badge">{{ $errors->first('capacity') }}</small>
                </div>
                <div class="col col-4">
                    <label class=" form-control-label">Mổ tả vị trí phòng</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-thumb-tack"></i></div>
                        <input type="text" class="form-control" name="location" value="{{ old('location')}}" placeholder="Nhập mô tả vị trí của phòng học">
                    </div>
                    <small class="form-text text-danger badge">{{ $errors->first('location') }}</small>
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
              <th scope="col">Tên phòng</th>
              <th scope="col">Sức chứa</th>
              <th scope="col">Mô tả vị trí phòng</th>
              
              <th width='170px' scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listRoom as $value)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$value->name}}</td>
                    <td>{{$value->capacity}}</td>
                    <td>{{$value->location}}</td>
                    <td>
                        <form action="{{ route('rooms.destroy', $value->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger " onclick="return confirm('Bạn có chắc muốn xóa không?')">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>
                        <a class="btn btn-warning"  href="{{route('rooms.edit',$value->id)}}">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                         <button type="button" class="btn btn-info" data-toggle="modal" 
                            data-target="#roomDetailModal-{{ $value->id }}">
                            <i class="fa fa-info-circle"></i>
                        </button>
                    </td>
                </tr>
                @include('page.room.show')
            @endforeach
        </tbody>
    </table>
    {{$listRoom->links()}}
@endsection
@push('scripts') 
@endpush
