@extends('layouts.master')
@section('title')
    Danh sách chi phí khác
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Danh sách chi phí khác</h4>
        </div>
        <div class="text-end mt-3 mx-3">
            <a href=""></a>
            <a href="{{ route('expense.create') }}" class="btn btn-success">Thêm mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Số tiền chi</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Thông tin chi tiết</th>
                            <th scope="col">Ngày chi</th>
                            <th scope="col">Chi cho</th>
                            <th scope="col">Phương thức thanh toán</th>
                            <th scope="col">Ghi chú</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $expense)
                            <tr>
                                <th scope="row" class="text-center">{{ $key + 1 }}</th>
                                <td>{{ $expense->amount }}</td>
                                <td>{{ $expense->title }}</td>
                                <td>{{ $expense->description }}</td>
                                <td>{{ $expense->date }}</td>
                                <td>{{ $expense->paid_to }}</td>
                                <td>{{ $expense->payment_method }}</td>
                                <td>{{ $expense->note }}</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="mr-1">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#expenseDetailModal-{{ $expense->id }}">
                                                <i class="fa fa-info-circle"></i>
                                            </button>
                                        </div>

                                        <div class="mr-1">
                                            <a href="{{ route('expense.edit', $expense->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                        </div>

                                        <div>
                                            <form action="{{ route('expense.destroy', $expense->id) }}" method="post">
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
                            @include('page.expense.show')
                        @endforeach

                    </tbody>
                </table>

                {{ $data->links() }}
            </div>
        </div>

    </div>
@endsection
