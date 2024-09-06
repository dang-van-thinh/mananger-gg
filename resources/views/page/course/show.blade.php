<div>
    <div class="modal fade" id="courseDetailModal-{{ $course->id }}" tabindex="-1" role="dialog"
        aria-labelledby="courseDetailModalLabel-{{ $course->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header d-flex">
                    <h5 class="modal-title" id="courseDetailModalLabel-{{ $course->id }}">
                        Chi tiết khóa học: {{ $course->name }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div>
                        <div class="form-group">
                            <label for="name" class="control-label mb-1">Tên khóa học</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-book"></i></div>
                                </div>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ $course->name }}" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="control-label mb-1">Giá khóa học</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-money"></i></div>
                                </div>
                                <input type="number" id="price" name="price" class="form-control"
                                    value="{{ $course->price }}" disabled>
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
