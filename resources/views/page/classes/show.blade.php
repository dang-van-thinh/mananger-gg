<div>
    <div class="modal fade" id="classDetailModal-{{ $class->id }}" tabindex="-1" role="dialog"
        aria-labelledby="classDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header d-flex">
                    <h5 class="modal-title" id="classDetailModalLabel">Chi tiết lớp học</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name" class="form-label"> Tên lớp học </label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-graduation-cap"
                                            aria-hidden="true"></i></div>
                                    <input type="text" name="name" disabled class="form-control" id="name"
                                        value="{{ $class->name }}" placeholder="Nhập tên lớp học">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="start_date" class="form-label">Ngày dự kiến bắt đầu</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i>
                                    </div>
                                    <input type="date" name="start_date" disabled class="form-control"
                                        id="start_date" value="{{ $class->start_date }}"
                                        placeholder="Nhập ngày bắt đầu của lớp">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="end_date" class="form-label">Ngày dự kiến kết thúc</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i>
                                    </div>
                                    <input type="date" name="end_date" disabled class="form-control" id="end_date"
                                        value="{{ $class->end_date }}">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="course_id" class="form-label">Khóa học</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-leanpub" aria-hidden="true"></i></i>
                                    </div>
                                    <input type="text" value="{{ $class->course->name }}" disabled
                                        class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="room_id" class="form-label">Phòng học</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    </div>
                                    <input type="text" value="{{ $class->room->name }}" disabled
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="teacher_id" class="form-label">Giáo viên</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-address-card" aria-hidden="true"></i>
                                    </div>
                                    <input type="text" value="{{ $class->teacher->name }}" disabled
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>
                                    Ngày học trong tuần
                                </label>
                                <div class="input-group">
                                    @foreach ($class['dayOfClass'] as $day)
                                        <input type="text" value="{{ $day->name }}" disabled
                                            class="form-control text-center">
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="session_id" class="form-label">Ca học</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </div>
                                    <input type="text" value="{{ $class->session->name }}" disabled
                                        class="form-control">
                                </div>
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
