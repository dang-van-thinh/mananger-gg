
<div class="modal fade" id="detailModel" tabindex="-1" aria-labelledby="detailModelLabel"
aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Chi tiết giảng viên</h5>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Ảnh</label>
                                <div class="input-group justify-content-center">
                                    <img id="teacherImage" src="" alt="Teacher Image" class="img-fluid w-75 height-600 img-thumbnail rounded mx-auto d-block">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Tên giảng viên</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" class="form-control" name="name" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                    <input type="text" class="form-control" name="email" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Ngày sinh</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="date" class="form-control" name="birth_day" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Bằng cấp</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-graduation-cap"></i></div>
                                    <input type="text" class="form-control" name="degree" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Chuyên môn</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <input type="text" class="form-control" name="qualification" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Số điện thoại</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                    <input type="text" class="form-control" name="phone" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Lương theo giờ</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                    <input type="text" class="form-control" name="hourly_rate" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Địa chỉ</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                    <input type="text" class="form-control" name="address" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
 
