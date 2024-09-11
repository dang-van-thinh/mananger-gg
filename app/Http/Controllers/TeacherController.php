<?php

namespace App\Http\Controllers;

use App\Http\Requests\teacher\CreateTeacherRequest;
use App\Http\Requests\teacher\UpdateTeacherRequest;
use App\Http\Service\TeacherService;


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
        $listTeacher = $this->teacherService->getAll();
        return view('page.teacher.list', compact('listTeacher'));
    }


    public function create()
    {
        return view('page.teacher.create');
    }


    public function store(CreateTeacherRequest $request)
    {
        if($this->teacherService->createTeacher($request)){
            return redirect()->route('teachers.create')->with('success', 'Thêm giảng viên thành công.');
        }else{
            return back()->with('error', 'Thêm giảng viên thất bại.');
        }         
    }


    public function show($id)
    {
        $teacher = $this->teacherService->findTeacher($id);
        return response()->json($teacher);
    }


    public function edit($id)
    {
        $teacher = $this->teacherService->findTeacher($id);
        return view('page.teacher.update', compact('teacher'));
        
    }

    public function update(UpdateTeacherRequest $request, $id)
    {  
        if ($this->teacherService->updateTeacher($request, $id)) {
            return redirect()->route('teachers.index')->with('success', 'Sửa giảng viên thành công.');
        } else {
            return back()->with('error', 'Sửa giảng viên thất bại. Vui lòng thử lại.');
        }
    }

    public function destroy($id)
    {
        if( $this->teacherService->deleteTeacher($id)){
            return redirect()->route('teachers.index')->with('success', 'Xóa giảng viên thành công.');
        }else{
            return back()->with('error', 'Đã xảy ra lỗi không tìm thấy giảng viên.');
        }    
    }
}