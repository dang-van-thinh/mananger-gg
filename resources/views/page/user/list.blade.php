@extends('layouts.master')
@section('title')
    Danh sách người dùng
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Danh sách người dùng</h4>
        </div>
        <div class="text-end mt-3 mx-3">
            <a href=""></a>
            <a href="{{ route('user.create') }}" class="btn btn-success">Thêm mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th class="avatar">Ảnh</th>
                            <th scope="col">Tên người dùng</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Vai trò</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col" class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $user)
                            <tr>
                                <td class="serial">{{ $key + 1 }}</td>
                                <td class="avatar">
                                    <div class="round-img">
                                        <img class="rounded" src="{{ '/Storage/' . $user->image }}" alt="user image"
                                            width="50" height="50">
                                    </div>
                                </td>
                                <td><small>{{ $user->name }}</small></td>
                                <td><small>{{ $user->email }}</small></td>
                                <td><small>{{ $user->phone }}</small></td>
                                <td><small>{{ $user->role->name }}</small></td>
                                <td>
                                    <div class="form-check form-switch d-flex justify-content-center">
                                        <input class="form-check-input" type="checkbox" id="switch-{{ $user->id }}"
                                            data-id="{{ $user->id }}" {{ $user->active ? 'checked' : '' }}
                                            onchange="status(this)">

                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="mr-1">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#userDetailModal-{{ $user->id }}">
                                                <i class="fa fa-info-circle"></i>
                                            </button>
                                        </div>
                                        <div class="mr-1">
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                        </div>
                                        <div>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Có chắc chắn muốn xóa không?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @include('page.user.show')
                        @endforeach

                    </tbody>
                </table>
                {{ $data->links() }}
            </div> <!-- /.table-responsive -->
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function status(element) {
            var userId = $(element).data('id');

            $.ajax({
                url: "{{ route('user.status') }}",
                method: 'PUT',
                data: {
                    id: userId
                },
                dataType:'json',
                success: function(response) {
                    if (response.success) {
                        alert('Cập nhật trạng thái thành công! Trạng thái mới: ' + (response.status ?
                            'Kích hoạt' : 'Vô hiệu'));
                    } else {
                        alert('Cập nhật trạng thái thất bại: ' + response.message);
                    }
                },
                error: function(xhr) {
                    alert('Đã xảy ra lỗi: ' + xhr.responseText);
                }
            });
        }
    </script>
@endpush
