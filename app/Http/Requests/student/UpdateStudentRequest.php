<?php

namespace App\Http\Requests\student;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'email' => 'required|email|max:100',
            'birth_day' => 'required',
            'address' => 'required|max:255',
            'phone' => 'required|regex:/^(?:\+?[0-9]{1,3})?[\d\s\-]{7,15}$/|max:14'
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
            'birth_day.required' => $this->errors['required'],
            'address.required' => $this->errors['required'],
            'address.max' => 'Địa chỉ học viên tối đa có 255 ký tự !',
            'phone.required' => $this->errors['required'],
            'phone.regex' => 'Số điện thoại không đúng định dạng !',
            'phone.max' => 'Số điện thoại không vượt quá 14 ký tự !',

        ];
    }
}
