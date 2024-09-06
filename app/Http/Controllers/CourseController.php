<?php

namespace App\Http\Controllers;

use App\Http\Requests\course\StoreCourseRequest;
use App\Http\Requests\course\UpdateCourseRequest;
use App\Http\Service\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $courseService;
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }
    public function index()
    {
        $data = $this->courseService->getAll();
        return view('page.course.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        if ($this->courseService->store($request)) {
            return back()->with('success', 'Thêm mới khóa học thành công');
        } else {
            return back()->with('error', 'Thêm mới khóa học thất bại');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = $this->courseService->getById($id);
        return view('page.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, string $id)
    {
        if ($this->courseService->update($request, $id)) {
            return redirect()->route('course.index')->with('success', 'Cập nhật khóa học thành công');
        } else {
            return back()->with('error', 'Cập nhật khóa học thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if ($this->courseService->delete($id)) {
            return back()->with('success', 'Xóa khóa học thành công');
        } else {
            return back()->with('success', 'Xóa khóa học thất bại');
        }
    }
}
