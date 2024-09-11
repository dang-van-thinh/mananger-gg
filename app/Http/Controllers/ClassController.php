<?php

namespace App\Http\Controllers;

use App\Http\Requests\classes\CreateClassRequest;
use App\Http\Requests\classes\UpdateClassRequest;
use App\Http\Service\ClassesService;
use App\Models\Classes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClassController extends Controller
{

    private ClassesService $classesService;

    public function __construct(ClassesService $classesService)
    {
        $this->classesService = $classesService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = $this->classesService->all();
        return view("page.classes.list", compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'page.classes.create',
            [
                'data' => $this->classesService->createView()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateClassRequest $request)
    {
        // $startDate = Carbon::parse($request->start_date);
        // $endDate = Carbon::parse($request->end_date);
        // // validate ngày kết thúc của lớp học phải lớn hơn 7 (có thể thay đổi nếu cần)
        // if ($startDate->diffInDays($endDate) < 7) {
        //     return back()->withErrors([
        //         'end_date' => 'Ngày kết thúc phải tối thiếu cách ngày bắt đầu 7 ngày !'
        //     ])->withInput();
        // }
        // dd($request->day_of_week_id);


        $check = $this->classesService->store($request);
        if ($check) {
            return redirect()->route('classes.index')->with('success', 'Thêm mới lớp học thành công !');
        }
        return back()->with('error', 'Thêm lớp học thất bại !');
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
        $class = $this->classesService->edit($id);
        return view("page.classes.edit", [
            'class' => $class['class'],
            'dayOfClassId' => $class['dayOfClassId'],
            'data' => $this->classesService->createView()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassRequest $request, $id)
    {
        if ($this->classesService->update($id, $request)) {
            return redirect()->route('classes.index')->with('success', 'Thay đổi thành công thông tin lớp học !');
        }
        return back()->with('error', 'Thay đổi thất bại thông tin lớp học !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if ($this->classesService->delete($id)) {
            return back()->with('success', 'Xóa thành công lớp học !');
        }
        return back()->with('error', 'Không xóa được lớp học này !');
    }
}
