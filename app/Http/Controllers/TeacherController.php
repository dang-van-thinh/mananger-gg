<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Http\Service\TeacherService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    private $teacherService;

    public function __construct(
        TeacherService $teacherService
    ){
        $this->teacherService = $teacherService;
    }


    public function index()
    {
        return $this->teacherService->listTeacher();
    }


    public function create()
    {
        return view('page.teacher.create');
    }


    public function store(CreateTeacherRequest $request)
    {
       $dataTeacher = $this->teacherService->createTeacher($request);
       if ($dataTeacher) {
        // Điều hướng đến trang danh sách giáo viên với thông báo thành công
        return redirect()->route('teachers.index')->with('success', 'Thêm giảng viên thành công.');
    } else {
        // Nếu có lỗi, điều hướng trở lại với thông báo lỗi
        return redirect()->back()->with('error', 'Thêm giảng viên thất bại.');
    }
    }


    public function show(string $id)
    {
        //
    }


    public function edit($id)
    {
        $teacher = $this->teacherService->findTeacher($id);
        if ($teacher) {
            return view('page.teacher.update', compact('teacher'));
        } else {
            return redirect()->route('teachers.index')->with('error', 'Không tìm thấy giảng viên.');
        }
    }

    public function update(UpdateTeacherRequest $request, $id)
    {
        $updated = $this->teacherService->updateTeacher($request, $id);
        if ($updated) {
            return redirect()->route('teachers.index')->with('success', 'Sửa giảng viên thành công.');
        } else {
            return redirect()->back()->with('error', 'Sửa giảng viên thất bại.');
        }
    }

    public function destroy($id)
    {
        $deleted = $this->teacherService->deleteTeacher($id);
        if ($deleted) {
            return redirect()->route('teachers.index')->with('success', 'Xóa giảng viên thành công.');
        } else {
            return redirect()->route('teachers.index')->with('error', 'Xóa giảng viên thất bại.');
        }
    }
}
