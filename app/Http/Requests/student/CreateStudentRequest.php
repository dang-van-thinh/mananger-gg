<?php

namespace App\Http\Requests\student;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    private $errors = [
        'required' => 'Không được để trống trường này !'
    ];
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
        return [
            'name' => 'required|max:100',
            'email' => 'required|email|max:100|unique:students,email',
            'birth_day' => 'required',
            'address' => 'required|max:255',
            'image' => 'required|image|max:255',
            'phone' => 'required|numeric|max:14'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => $this->errors['required'],
            'name.max' => 'Tên học viên tối đa có 100 ký tự !',
            'email.required' => $this->errors['required'],
            'email.max' => 'Email học viên tối đa có 100 ký tự !',
            'email.email' => 'Sai định dạng email !',
            'email.unique' => 'Email đã tồn tại !',
            'birth_day.required' => $this->errors['required'],
            'address.required' => $this->errors['required'],
            'address.max' => 'Địa chỉ học viên tối đa có 255 ký tự !',
            'image.required' => $this->errors['required'],
            'image.image' => 'Sai định dạng ảnh !',
            'image.max' => 'Độ dài đường dẫn ảnh là 255 ký tự !',
            'phone.required' => $this->errors['required'],
            'phone.numeric' => 'Số điện thoại phải là số !',
            'phone.max' => 'Số điện thoại học viên tối đa có 14 ký tự !',

        ];
    }
}
