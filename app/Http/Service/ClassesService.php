<?php

namespace App\Http\Service;

use App\Http\Repository\ClassesRepository;
use App\Http\Requests\classes\CreateClassRequest;
use App\Http\Requests\classes\UpdateClassRequest;
use App\Models\DayOfWeek;

class ClassesService
{
    private RoomService $roomService;
    private CourseService $courseService;
    private TeacherService $teacherService;
    private SessionService $sessionService;
    private ClassesRepository $classesRepository;

    public function __construct(
        RoomService       $roomService,
        CourseService     $courseService,
        TeacherService    $teacherService,
        SessionService    $sessionService,
        ClassesRepository $classesRepository
    ) {
        $this->roomService = $roomService;
        $this->courseService = $courseService;
        $this->teacherService = $teacherService;
        $this->sessionService = $sessionService;
        $this->classesRepository = $classesRepository;
    }

    public function createView()
    {
        $dataCreate = [
            'sessions' => $this->sessionService->alls(),
            'courses' => $this->courseService->alls(),
            'rooms' => $this->roomService->alls(),
            'teachers' => $this->teacherService->alls(),
            'dayOfWeeks' => DayOfWeek::all(),
        ];
        return $dataCreate;
    }

    public function store(CreateClassRequest $request)
    {
        // check trùng ca học trong ngày của phòng học
        return $this->classesRepository->create($request);
    }

    public function all()
    {
        $data = $this->classesRepository->all();
        return $data;
    }

    public function edit($id)
    {
        $class = $this->classesRepository->edit($id);
        $dayOfClassId = $class->dayOfClass()->pluck('id');

        $dataClass = [
            'class' => $class,
            'dayOfClassId' => $dayOfClassId
        ];
        return $dataClass;
    }

    public function update($id, UpdateClassRequest $request)
    {
        $dataUpdate = [
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'session_id' => $request->session_id,
            'teacher_id' => $request->teacher_id,
            'course_id' => $request->course_id,
            'room_id' => $request->room_id
        ];

        return $this->classesRepository->update($id, $dataUpdate, $request);
    }

    public function delete($id)
    {
        if ($this->classesRepository->delete($id)) {
            return true;
        }
        return false;
    }
}
