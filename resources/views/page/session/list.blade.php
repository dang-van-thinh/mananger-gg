@extends('layouts.master')
@section('title')
    Danh sách giảng viên
@endsection
@section('content')
<div class="card">

<div class="card-header">
    <div>
        <h3 class="d-flex-inline">Danh sách giảng viên</h3>
    </div>
</div>
<div class="d-flex justify-content-end mt-3 me-3">
    <a class="btn btn-success px-4" href="{{ route('sessions.create') }}">
        Thêm mới
    </a>
</div>
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
