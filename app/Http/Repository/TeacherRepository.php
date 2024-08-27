<?php

namespace App\Http\Repository;
use App\Http\Requests\CreateTeacherRequest;
use App\Models\Teacher;

class TeacherRepository
{
    public function create($data){
       return Teacher::create($data);
    }
    public function getAll(){
        return Teacher::paginate(10);
    }
    public function delete($id){
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return true;
    }
    public function findOrFail($id){
        return Teacher::findOrFail($id);
    }
    public function update($id, $data){
        $teacher = Teacher::findOrFail($id);
        return $teacher->update($data); 
    }
    
}
