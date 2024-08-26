<?php

namespace App\Http\Repository;
use App\Http\Requests\CreateTeacherRequest;
use App\Models\Teacher;

class TeacherRepository
{
    public function create($data){
       return Teacher::create($data);
    }
    public function list(){
        return Teacher::paginate(10);;
    }
    public function delete($id){
        $teacher = Teacher::find($id);
        if ($teacher) {
            $teacher->delete();
            return true;
        }
        return false;
    }
    public function find($id){
        return Teacher::find($id);
    }
    public function update($id, $data){
        $teacher = Teacher::find($id);
        if ($teacher) {
            $teacher->update($data);
            return true;
        }
        return false;
    }
    
}
