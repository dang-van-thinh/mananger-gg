
<div class="modal fade" id="sessionDetailModal-{{ $value->id }}" tabindex="-1" role="dialog"
    aria-labelledby="sessionDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Chi tiết ca học</h5>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label class="form-control-label">Tên ca học học</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-tag"></i></div>
                                <input type="text" class="form-control" name="name" value="{{$value->name}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Giờ bắt đầu</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                <input type="text" class="form-control" name="start_time"  value="{{$value->start_time}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Giờ kết thúc</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                <input type="text" class="form-control" name="end_time" value="{{$value->end_time}}" readonly>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
 
