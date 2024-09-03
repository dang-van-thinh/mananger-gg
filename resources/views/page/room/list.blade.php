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
    <a class="btn btn-success px-4" href="{{ route('rooms.create') }}">
        Thêm mới
    </a>
</div>
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
                        <a class="btn btn-info" href="#"  data-name="{{$value->name}}"  data-capacity="{{$value->capacity}}"  data-location="{{$value->location}}" data-bs-toggle="modal" data-bs-target="#detailModel" id="myButton"> 
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$listRoom->links()}}
    @include('page.room.room-list-modal')
@endsection
@push('scripts') 
<script>
     var detailModel = document.getElementById('detailModel');
     detailModel.addEventListener('show.bs.modal', function (event) {
        var button = document.getElementById('myButton');
        document.querySelector('input[name="name"]').value =  button.getAttribute('data-name') ;
        document.querySelector('input[name="capacity"]').value = button.getAttribute('data-capacity') ;
        document.querySelector('input[name="location"]').value = button.getAttribute('data-location') ;
     })
</script>
@endpush
