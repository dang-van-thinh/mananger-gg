<?php

namespace App\Http\Requests\course;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'name'  => 'required|max:255',
            'price' => 'required|numeric|min:0',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'   => 'Tên khóa học là bắt buộc.',
            'price.required'  => 'Giá khóa học là bắt buộc.',
            'price.numeric'   => 'Giá khóa học phải là một số.',
            'price.min'       => 'Giá khóa học không được nhỏ hơn 0.',
        ];
    }
}
