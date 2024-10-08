<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="fw-bold">
                    <a href="{{ route('dashboard') }}"><i class="menu-icon fa fa-home"></i>Trang chủ </a>
                </li>
                {{-- <li class="menu-title">UI elements</li><!-- /.menu-title --> --}}
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-users"></i>QL Học viên</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-list"></i><a href="{{ route('students.index') }}">Danh sách học viên</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-users"></i>QL Giảng Viên</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-list"></i><a href="{{route('teachers.index')}}">Danh sách giảng viên</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-users"></i>QL Lớp Học</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-list"></i><a href="{{route('classes.index')}}">Danh sách lớp học</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="menu-icon fa fa-id-card"></i>QL Vai Trò</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-list"></i><a href="{{ route('role.index') }}">Danh sách vai trò</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="menu-icon fa fa-user"></i>QL Người Dùng</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-list"></i><a href="{{ route('user.index') }}">Danh sách người dùng</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"

                        aria-expanded="false"><i class="menu-icon fa fa-building"></i>QL Phòng Học</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-list"></i><a href="{{ route('rooms.index') }}">Danh sách phòng học</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="menu-icon fa fa-clock-o"></i>QL Ca Học</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-list"></i><a href="{{ route('sessions.index') }}">Danh sách ca học</a></li>
                    </ul>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="menu-icon fa fa-money"></i>QL Chi Phí Khác</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-list"></i><a href="{{ route('expense.index') }}">Danh sách chi phí khác</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="menu-icon fa fa-book"></i>QL Khóa học</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-list"></i><a href="{{ route('course.index') }}">Danh sách khóa học</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</aside>
