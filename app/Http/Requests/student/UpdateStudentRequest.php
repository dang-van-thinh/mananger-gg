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
            'name' => 'required',
            'email' => 'required|email',
            'birth_day' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => $this->errors['required'],
            'email.required' => $this->errors['required'],
            'email.email' => 'Sai định dạng email !',
            'birth_day.required' => $this->errors['required'],
            'address.required' => $this->errors['required'],
            'phone.required' => $this->errors['required'],
            'phone.numeric' => 'Số điện thoại phải là số !'
        ];
    }
}
