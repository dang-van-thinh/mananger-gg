<?php

namespace App\Http\Requests;

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
            'name' => 'required',
            'email' => 'required',
            'birth_day' => 'required',
            'qualification' => 'required',
            'hourly_rate' => 'required',
            'phone' => 'required',
            'degree' => 'required',
            'address' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Không được bỏ trống tên giảng viên.',
            'email.required' => 'Không được bỏ trống email.',
            'birth_day.required' => 'Không được bỏ trống ngày tháng năm sinh.',
            'qualification.required' => 'Không được bỏ trống Thông tin chuyên môn.',
            'hourly_rate.required' => 'Không được bỏ trống Lương theo giờ của giáo viên.',
            'phone.required' => 'Không được bỏ trống số điện thoại.',
            'degree.required' => 'Không được bỏ trống Bằng cấp.',
            'address.required' => 'Không được bỏ trống địa chỉ.',
        ];
    }
}
