<?php

namespace App\Http\Service;

use App\Http\Repository\StudentRepository;
use App\Http\Requests\student\CreateStudentRequest;
use App\Http\Requests\student\UpdateStudentRequest;
use DateTime;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;

class StudentService
{
    private $studentRepository;

    public function __construct(
        StudentRepository $studentRepository
    ) {
        $this->studentRepository = $studentRepository;
    }

    public function getAll()
    {
        return $this->studentRepository->all();
    }


    public function create(CreateStudentRequest $request)
    {
        $dataStudent = [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'birth_day' => $request->birth_day,
            'phone' => $request->phone
        ];

        if ($request->hasFile('image')) {
            $dataStudent['image'] = Storage::put('students', $request->file('image'));
        }

        return $this->studentRepository->create($dataStudent);
    }

    public function getOne($studentId)
    {
        return $this->studentRepository->findOne($studentId);
    }

    public function delete($studentId)
    {
        $student =  $this->studentRepository->findOne($studentId);

        $image = $student->image;
        $fullPath = "/public/" . $image;
        Storage::delete($fullPath);

        return $this->studentRepository->delete($student->id);
    }

    public function update(UpdateStudentRequest $request, $studentId)
    {
        $student = $this->studentRepository->findOne($studentId);

        $dataUpdate = [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->email,
            'birth_day' => $request->birth_day,
            'phone' => $request->phone
        ];

        if ($request->hasFile('image')) {
            Storage::exists($student->image) ? Storage::delete($student->image) : null;
            $dataUpdate['image'] = Storage::put('students', $request->file('image'));
        }

        return $this->studentRepository->update($dataUpdate, $studentId);
    }
}
