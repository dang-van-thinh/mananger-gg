<div>
    <div class="modal fade" id="expenseDetailModal-{{ $expense->id }}" tabindex="-1" role="dialog"
        aria-labelledby="expenseDetailModalLabel-{{ $expense->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header d-flex">
                    <h5 class="modal-title" id="expenseDetailModalLabel-{{ $expense->id }}">Chi tiết chi phí</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="amount" class="control-label mb-1">Số tiền chi</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-money"></i></div>
                                    </div>
                                    <input type="text" id="amount" name="amount" class="form-control"
                                        value="{{ $expense->amount }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title" class="control-label mb-1">Tiêu đề</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-pencil"></i></div>
                                    </div>
                                    <input type="text" id="title" name="title" class="form-control"
                                        value="{{ $expense->title }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="control-label mb-1">Thông tin chi tiết</label>
                                <textarea id="description" name="description" class="form-control" readonly>{{ $expense->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="date" class="control-label mb-1">Ngày chi</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <input type="text" id="date" name="date" class="form-control"
                                        value="{{ $expense->date }}" readonly>
                                </div>
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
                                        value="{{ $expense->paid_to }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="payment_method" class="control-label mb-1">Phương thức thanh toán</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-credit-card"></i></div>
                                    </div>
                                    <input type="text" id="payment_method" name="payment_method" class="form-control"
                                        value="{{ $expense->payment_method }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="note" class="control-label mb-1">Ghi chú</label>
                                <textarea id="note" name="note" class="form-control" readonly>{{ $expense->note }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
</div>
