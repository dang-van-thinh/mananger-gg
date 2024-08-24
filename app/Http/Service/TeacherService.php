<?php

namespace App\Http\Service;

use App\Http\Repository\TeacherRepository;
use App\Http\Requests\CreateTeacherRequest;

class TeacherService
{
    private TeacherRepository $teacherRepository;

    public function __construct(TeacherRepository $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }

    public function createTeacher(CreateTeacherRequest $request)
    {

        $data = [
            'name' => $request->name_1
        ];

        return $this->teacherRepository->create($data);
    }
}
