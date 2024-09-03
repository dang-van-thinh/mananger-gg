<?php

namespace App\Http\Requests\room;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'capacity' => 'required|integer', 
            'location' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Không được bỏ trống tên phòng học.',
            'name.max' => 'Tên phòng học không được vượt quá 100 ký tự.',
            
            'capacity.required' => 'Không được bỏ trống sức chứa.',
            'capacity.integer' => 'Sức chứa phải là số nguyên.',
            
            'location.required' => 'Không được bỏ trống mô tả vị trí.',
            'location.max' => 'Mô tả vị trí không được vượt quá 255 ký tự.',
        ];
    }
}