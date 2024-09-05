
<div class="modal fade" id="detailModel" tabindex="-1" aria-labelledby="detailModelLabel"
aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Chi tiết phòng học</h5>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label class="form-control-label">Tên phòng học</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" class="form-control" name="name" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Sức chứa phòng học</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" class="form-control" name="capacity" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Mô tả vị trí phòng học</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" class="form-control" name="location" readonly>
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
 
