<?php

namespace App\Http\Service;

use App\Http\Repository\CourseRepository;
use App\Http\Requests\course\StoreCourseRequest;
use App\Http\Requests\course\UpdateCourseRequest;

class CourseService
{
    protected $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function alls()
    {
        return $this->courseRepository->alls();
    }

    public function getAll()
    {
        return $this->courseRepository->all();
    }
    public function getById($id)
    {
        return $this->courseRepository->find($id);
    }
    public function store(StoreCourseRequest $request)
    {
        $data = $request->validated();
        return $this->courseRepository->store($data);
    }
    public function update(UpdateCourseRequest $request, $id)
    {
        $data = $request->validated();
        return $this->courseRepository->update($data, $id);
    }
    public function delete($id) {
        return $this->courseRepository->delete($id);
    }
}
