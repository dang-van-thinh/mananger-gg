<?php

namespace App\Http\Requests\teacher;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
{
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
        return [
            'name' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u', 
            'email' => 'required|email|', 
            'birth_day' => 'required|date|before_or_equal:today', 
            'qualification' => 'required|string|max:255',
            'hourly_rate' => 'required|numeric|min:0',
            'phone' => 'required|string|regex:/^(\+?[\d\s\-]){7,15}$/',
            'degree' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Không được bỏ trống tên giảng viên.',
            'name.regex' => 'Tên giảng viên chỉ được phép chứa các ký tự chữ cái và khoảng trắng.',
            'email.required' => 'Không được bỏ trống email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'birth_day.required' => 'Không được bỏ trống ngày sinh.',
            'birth_day.date' => 'Ngày sinh không hợp lệ.',
            'birth_day.before_or_equal' => 'Ngày sinh không được vượt quá ngày hiện tại.',
            'qualification.required' => 'Không được bỏ trống thông tin chuyên môn.',
            'hourly_rate.required' => 'Không được bỏ trống lương theo giờ.',
            'hourly_rate.numeric' => 'Lương theo giờ phải là một số.',
            'hourly_rate.min' => 'Lương theo giờ không được nhỏ hơn 0.',
            'phone.required' => 'Không được bỏ trống số điện thoại.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'degree.required' => 'Không được bỏ trống bằng cấp.',
            'address.required' => 'Không được bỏ trống địa chỉ.',
        ];
    }
}