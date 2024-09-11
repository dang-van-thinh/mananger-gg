<?php

namespace App\Http\Requests\setting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'logo'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo_tab'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'logo.image'     => 'Logo phải là một file ảnh.',
            'logo.mimes'     => 'Logo chỉ chấp nhận các định dạng: jpeg, png, jpg, gif.',
            'logo.max'       => 'Kích thước Logo không được vượt quá 2MB.',

            'logo_tab.image' => 'Logo tab phải là một file ảnh.',
            'logo_tab.mimes' => 'Logo tab chỉ chấp nhận các định dạng: jpeg, png, jpg, gif.',
            'logo_tab.max'   => 'Kích thước Logo tab không được vượt quá 2MB.',
        ];
    }
}
