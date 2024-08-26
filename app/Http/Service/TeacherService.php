<?php

namespace App\Http\Service;

use App\Http\Repository\TeacherRepository;
use App\Http\Requests\CreateTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;

class TeacherService
{
    private TeacherRepository $teacherRepository;

    public function __construct(TeacherRepository $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }

    public function createTeacher(CreateTeacherRequest $request)
    {
        $image = $request->file('image');
        $imageName =  time(). '.'. $image->getClientOriginalExtension();
        $linkStorage = 'imageTeacher/';
        $image->move(public_path($linkStorage), $imageName );
        $data = [
            'name' => $request->name,
            'image' => $imageName,
            'email' => $request->email,
            'phone' => $request->phone,
            'degree' => $request->degree,
            'address' => $request->address,
            'birth_day' => $request->birth_day,
            'qualification' => $request->qualification,
            'hourly_rate' => $request->hourly_rate,
        ];
        // dd($data);
        return $this->teacherRepository->create($data);
    }
    
    public function listTeacher()
    {
        $listTeacher = $this->teacherRepository->list();
        return view('page.teacher.list', compact('listTeacher'));
    }
    public function deleteTeacher($id)
    {
        return $this->teacherRepository->delete($id);
    }
    public function findTeacher(string $id){
        return $this->teacherRepository->find($id);
    }
    public function updateTeacher(UpdateTeacherRequest $request, $id){
        $teacher = $this->teacherRepository->find($id);
        if (!$teacher) {
            return false;
        }
    
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
            // Xóa ảnh cũ nếu có
            if ($teacher->image && file_exists(public_path('imageTeacher/' . $teacher->image))) {
                unlink(public_path('imageTeacher/' . $teacher->image));
            }
    
            // Lưu ảnh mới
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $linkStorage = 'imageTeacher/';
            $image->move(public_path($linkStorage), $imageName);
            $data['image'] = $imageName;
        } elseif (!$teacher->image) {
            // Nếu không có ảnh mới  thì k phải đổi
            $data['image'] = $teacher->image;
        }
    
        return $this->teacherRepository->update($id, $data);
    }
    
    

}
