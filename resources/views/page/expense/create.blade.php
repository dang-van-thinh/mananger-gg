@extends('layouts.master')
@section('title')
    Thêm mới chi phí khác
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Thêm mới chi phí khác</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('expense.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="amount" class="control-label mb-1">Số tiền chi</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-money"></i></div>
                                </div>
                                <input type="number" id="amount" name="amount" class="form-control"
                                    value="{{ old('amount') }}" placeholder="Nhập Số tiền chi">
                            </div>
                            @error('amount')
                                <p class="text-danger badge">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title" class="control-label mb-1">Tiêu đề</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-pencil"></i></div>
                                </div>
                                <input type="text" id="title" name="title" class="form-control"
                                    value="{{ old('title') }}" placeholder="Nhập Tiêu đề">
                            </div>
                            @error('title')
                                <p class="text-danger badge">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description" class="control-label mb-1">Thông tin chi tiết</label>
                            <div class="input-group">
                                <textarea id="description" name="description" class="form-control" placeholder="Nhập Thông tin chi tiết" cols="30"
                                    rows="5">{{ old('description') }}</textarea>
                            </div>
                            @error('description')
                                <p class="text-danger badge">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="date" class="control-label mb-1">Ngày chi</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <input type="date" id="date" name="date" class="form-control"
                                    value="{{ old('date') }}">
                            </div>
                            @error('date')
                                <p class="text-danger badge">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="paid_to" class="control-label mb-1">Chi cho</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                </div>
                                <input type="text" id="paid_to" name="paid_to" class="form-control"
                                    value="{{ old('paid_to') }}" placeholder="Nhập tên người nhận">
                            </div>
                            @error('paid_to')
                                <p class="text-danger badge">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="payment_method" class="control-label mb-1">Phương thức thanh toán</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-credit-card"></i></div>
                                </div>
                                <select id="payment_method" name="payment_method" class="form-control">
                                    <option value="Chuyển khoản">Chuyển khoản</option>
                                    <option value="Tiền mặt">Tiền mặt</option>
                                </select>
                            </div>
                            @error('payment_method')
                                <p class="text-danger badge">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="note" class="control-label mb-1">Ghi chú</label>
                            <div class="input-group">
                                <textarea id="note" name="note" class="form-control" placeholder="Nhập ghi chú" cols="30" rows="5">{{ old('note') }}</textarea>
                            </div>
                            @error('note')
                                <p class="text-danger badge">{{ $message }}</p>
                            @enderror
                        </div>


                    </div>
                </div>

                <div class="form-actions form-group">
                    <a href="{{ route('expense.index') }}" class="btn btn-primary btn-sm">Quay lại</a>
                    <button type="submit" class="btn btn-success btn-sm">Tạo mới</button>
                </div>
            </form>
        </div>
    </div>
@endsection
