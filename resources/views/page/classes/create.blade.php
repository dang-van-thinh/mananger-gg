@extends('layouts.master')
@section('title')
    Thêm mới lớp học
@endsection
@section('content')
    <div class="card">
        <h3 class="card-header text-center">Thêm mới lớp học</h3>
        <div class="p-4">
            <form action="{{ route('classes.store') }}" method="post" id="formHandler"
                data-url="{{ route('api.sessions.filter') }}" data-urlsession ="{{ route('api.sessions') }}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name" class="form-label"> Tên lớp học </label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></div>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ old('name') }}" placeholder="Nhập tên lớp học">
                            </div>
                            @if ($errors->has('name'))
                                <div class="form-text badge text-danger">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="start_date" class="form-label">Ngày dự kiến bắt đầu</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                <input type="date" name="start_date" class="form-control" id="start_date"
                                    value="{{ old('start_date') }}" placeholder="Nhập ngày bắt đầu của lớp">
                            </div>
                            @if ($errors->has('start_date'))
                                <div class="form-text badge text-danger">
                                    {{ $errors->first('start_date') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="end_date" class="form-label">Ngày dự kiến kết thúc</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                <input type="date" name="end_date" class="form-control" id="end_date"
                                    value="{{ old('end_date') }}">
                            </div>
                            @if ($errors->has('end_date'))
                                <div class="form-text badge text-danger">
                                    {{ $errors->first('end_date') }}
                                </div>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="course_id" class="form-label">Khóa học</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-leanpub" aria-hidden="true"></i></i></div>
                                <select name="course_id" id="course_id" class="form-select">
                                    @foreach ($data['courses'] as $course)
                                        <option value=" {{ $course->id }} ">
                                            {{ $course->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('course_id'))
                                <div class="form-text badge text-danger">
                                    {{ $errors->first('course_id') }}
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="room_id" class="form-label">Phòng học</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                <select name="room_id" id="room_id" class="form-select">
                                    @foreach ($data['rooms'] as $room)
                                        <option value=" {{ $room->id }} ">
                                            {{ $room->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('room_id'))
                                <div class="form-text badge text-danger">
                                    {{ $errors->first('room_id') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="teacher_id" class="form-label">Giáo viên</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-address-card" aria-hidden="true"></i></div>
                                <select name="teacher_id" id="teacher_id" class="form-select">
                                    @foreach ($data['teachers'] as $teacher)
                                        <option value=" {{ $teacher->id }} ">
                                            {{ $teacher->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            @if ($errors->has('teacher_id'))
                                <div class="form-text badge text-danger">
                                    {{ $errors->first('teacher_id') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>
                                Ngày học trong tuần
                            </label>
                            <div class="input-group">
                                <select name="day_of_week_id[]" id="day_of_week_id" class="form-select" multiple>

                                    @foreach ($data['dayOfWeeks'] as $day)
                                        <option value=" {{ $day->id }} ">
                                            {{ $day->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            @if ($errors->has('day_of_week_id'))
                                <div class="form-text badge text-danger">
                                    {{ $errors->first('day_of_week_id') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="session_id" class="form-label">Ca học</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                                <select name="session_id" id="session_id" class="form-select">
                                    <option value="">[Chọn ca học]</option>
                                    @foreach ($data['sessions'] as $session)
                                        <option class="opt-session" value=" {{ $session->id }} ">
                                            {{ $session->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            @if ($errors->has('session_id'))
                                <div class="form-text badge text-danger">
                                    {{ $errors->first('session_id') }}
                                </div>
                            @endif
                        </div>

                    </div>
                    <div>
                        <a class="btn btn-info" href="{{ route('classes.index') }}">Quay lại</a>
                        <button type="submit" class="btn btn-primary px-5">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/assets/select2/select2.min.js"></script>
    <script src="/assets/js/createClasses.js"></script>
@endpush
