<?php

namespace App\Http\Repository;
use App\Models\Teacher;
use Illuminate\Support\Facades\Storage;

class TeacherRepository
{
    public function create($data){
       return Teacher::create($data);
    }

    public function alls()
    {
        return Teacher::all();
    }
    public function getAll(){
        return Teacher::paginate(10);
    }
    public function delete($id){
        $teacher = Teacher::findOrFail($id);
        $imagePath = $teacher->image;
        $teacher->delete();

        if ($imagePath && Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }
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
