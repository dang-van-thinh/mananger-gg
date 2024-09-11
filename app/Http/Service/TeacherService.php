<?php

namespace App\Http\Service;

use App\Http\Repository\TeacherRepository;
use App\Http\Requests\teacher\CreateTeacherRequest;
use App\Http\Requests\teacher\UpdateTeacherRequest;
use Illuminate\Support\Facades\Storage;
class TeacherService
{
    private TeacherRepository $teacherRepository;

    public function __construct(TeacherRepository $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }

    public function alls()
    {
        return $this->teacherRepository->alls();
    }

    public function createTeacher(CreateTeacherRequest $request)
{
    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'degree' => $request->degree,
        'address' => $request->address,
        'birth_day' => $request->birth_day,
        'qualification' => $request->qualification,
        'hourly_rate' => $request->hourly_rate,
    ];

    if ($request->hasFile('image')) {
        $data['image'] = Storage::put('teacher', $request->file('image'));
    }

    return $this->teacherRepository->create($data);
}
    public function getAllTeachers()
    {
        return $this->teacherRepository->getAll();
    }
    public function deleteTeacher($id)
    {
        return $this->teacherRepository->delete($id);
    }
    public function findTeacher(string $id)
    {
        return $this->teacherRepository->findOrFail($id);
    }
    public function updateTeacher(UpdateTeacherRequest $request, $id)
    {
        $teacher = $this->teacherRepository->findOrFail($id);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'degree' => $request->degree,
            'address' => $request->address,
            'birth_day' => $request->birth_day,
            'qualification' => $request->qualification,
            'hourly_rate' => $request->hourly_rate,
        ];
        if ($request->hasFile('image')) {
            if (Storage::exists($teacher->image)) {
                Storage::delete($teacher->image);
            }
            $data['image'] = Storage::put('teacher', $request->file('image'));

        } elseif (!$request->hasFile('image') && $teacher->image) {
            $data['image'] = $teacher->image;
        }
        return $this->teacherRepository->update($id, $data);
    }
}
