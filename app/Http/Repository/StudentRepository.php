<?php

namespace App\Http\Repository;

use App\Http\Requests\student\CreateStudentRequest;
use App\Http\Requests\student\UpdateStudentRequest;
use App\Models\Student;

class StudentRepository
{
    public function all(){
        return Student::paginate(10);
    }

    public function create($data)
    {
        return Student::create($data);
    }

    public function findOne($studentId)
    {
        return Student::findOrFail($studentId);
    }

    public function delete($studentId)
    {
        return Student::findOrFail($studentId)->delete();
    }

    public function update($dataUpdate, $studentId)
    {
        return Student::findOrFail($studentId)
            ->update($dataUpdate);
    }
}
