<?php

namespace App\Http\Requests\classes;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClassRequest extends FormRequest
{
    private $errors = [
        'required' => 'Không được để trống trường này !'
    ];
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $classId = $this->route('class');
        return [
            'name' => 'required|max:255|unique:classes,name,' . $classId,
            'course_id' => 'required',
            'room_id' => 'required',
            'teacher_id' => 'required',
            'session_id' => 'required',
            'day_of_week_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after:start_date|'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => $this->errors['required'],
            'name.unique' => 'Tên lớp học đã tồn tại !',
            'name.max' => 'Tên khóa học không quá 255 ký tự !',
            'course_id.required' => $this->errors['required'],
            'room_id.required' => $this->errors['required'],
            'teacher_id.required' => $this->errors['required'],
            'session_id.required' => $this->errors['required'],
            'day_of_week_id.required' => $this->errors['required'],
            'start_date.required' => $this->errors['required'],
            'end_date.required' => $this->errors['required'],
            'end_date.after' => 'Ngày kết thúc của khóa học phải diễn ra sau ngày bắt đầu !',
        ];
    }
}
