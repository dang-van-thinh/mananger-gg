<?php

namespace App\Http\Repository;
use App\Http\Requests\CreateTeacherRequest;
use App\Models\Teacher;

class TeacherRepository
{
    public function create($data)
    {
       return Teacher::create($data);
    }
}
