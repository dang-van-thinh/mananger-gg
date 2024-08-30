<div>
    <div class="modal fade" id="userDetailModal-{{ $user->id }}" tabindex="-1" role="dialog"
        aria-labelledby="userDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header d-flex">
                    <h5 class="modal-title" id="userDetailModalLabel">Chi tiết người dùng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-5 overflow-hidden d-flex justify-content-center align-items-center">
                            <img src="{{ \Storage::url($user->image) }}" class="img-thumbnail w-100" alt="Cinque Terre">
                        </div>                        
                        <div class="col-sm-7">
                            <form action="">
                                <div class="form-group">
                                    <label class="control-label mb-1">Họ và tên</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Số điện thoại</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input type="text" class="form-control" value="{{ $user->phone }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Vai trò</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-id-card"></i></div>
                                        <input type="text" class="form-control" value="{{ $user->role->name }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Trạng thái</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></div>
                                        <input type="text" class="form-control"
                                            value=" {{ $user->active ? 'Kích hoạt' : 'Vô hiệu' }}" disabled>
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
