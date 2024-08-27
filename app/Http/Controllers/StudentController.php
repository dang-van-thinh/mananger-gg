<?php

namespace App\Http\Controllers;

use App\Http\Requests\student\CreateStudentRequest;
use App\Http\Requests\student\UpdateStudentRequest;
use App\Http\Service\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    private $studentService;

    public function __construct(
        StudentService $studentService
    ) {
        $this->studentService = $studentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = $this->studentService->getAll();
        return view('page.student.list', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateStudentRequest $request)
    {
        $student = $this->studentService->create($request);
        if (!$student) {
            return redirect()->back()->with('error', 'Thêm học viên thất bại !');
        }
        return redirect()->route('students.create')->with('success', 'Thêm mới thành công !');
    }

    public function show(string $id)
    {
        return $this->studentService->getOne($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = $this->studentService->getOne($id);
        return view('page.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, string $id)
    {
        if ($this->studentService->update($request, $id)) {
            return redirect()->route('students.index')->with('success', 'Thay đổi thành công thông tin học viên !');
        }
        return redirect()->back()->with('error', 'Thay đổi không thành công !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if ($this->studentService->delete($id)) {
            return redirect()->route('students.index')->with('success', 'Xóa thành công học viên !');
        }
        return redirect()->back()->with('error', 'Xóa không thành công !');
    }
}
