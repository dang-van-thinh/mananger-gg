<?php

namespace App\Http\Repository;

use App\Models\Course;

class CourseRepository
{

    public function all()
    {
        return Course::latest('id')->paginate(10);
    }

    public function find($id)
    {
        return Course::find($id);
    }

    public function store(array $data)
    {
        return Course::create($data);
    }

    public function update(array $data, $id)
    {
        $course = Course::find($id);
        $course->update($data);
        return $course;
    }

    public function delete($id)
    {
        $course = Course::find($id);
        $course->delete();
        return true;
    }
}
