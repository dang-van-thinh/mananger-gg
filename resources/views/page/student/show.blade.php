<div>
    <div class="modal fade" id="studentDetailModal-{{ $student->id }}" tabindex="-1" role="dialog"
        aria-labelledby="studentDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header d-flex">
                    <h5 class="modal-title" id="studentDetailModalLabel">Chi tiết học viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-5 d-flex justify-content-center align-items-center overflow-hidden">
                            <img src="{{ '/Storage/' . $student->image }}" class="img-thumbnail w-100"
                                alt="Cinque Terre">
                        </div>
                        <div class="col-sm-7">
                            <form action="">
                                <div class="form-group">
                                    <label class="control-label mb-1">Họ và tên</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" class="form-control" value="{{ $student->name }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input type="text" class="form-control" value="{{ $student->email }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Số điện thoại</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input type="text" class="form-control" value="{{ $student->phone }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="form-label">Địa chỉ</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-map-marker"
                                                aria-hidden="true"></i></div>
                                        <input type="text" name="address" class="form-control" id="address"
                                            value="{{ $student->address }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="birth_day" class="form-label">Ngày sinh</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar-o"
                                                aria-hidden="true"></i></div>
                                        <input type="date" name="birth_day" class="form-control"
                                            value="{{ $student->birth_day }}" id="birth_day" disabled>
                                    </div>
                                </div>
                            </form>

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
