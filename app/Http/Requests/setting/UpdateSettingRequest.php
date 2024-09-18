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
            'logo'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=145,height=40',
            'logo_tab'  => 'nullable|image|mimes:jpeg,png,jpg,ico|max:512|dimensions:min_width=16,min_height=16,max_width=512,max_height=512,ratio=1/1',
        ];
        
    }
    public function messages(): array
    {
        return [
            'logo.image'          => 'Logo phải là một file ảnh.',
            'logo.mimes'          => 'Logo chỉ chấp nhận các định dạng: jpeg, png, jpg, gif.',
            'logo.max'            => 'Kích thước Logo không được vượt quá 2MB.',
            'logo.dimensions'     => 'Logo có kích thước không hợp lệ.',
    
            'logo_tab.image'      => 'Biểu tượng website phải là một file ảnh.',
            'logo_tab.mimes'      => 'Biểu tượng website chỉ chấp nhận các định dạng: jpeg, png, jpg, ico, gif.',
            'logo_tab.max'        => 'Kích thước Biểu tượng website không được vượt quá 512KB.',
            'logo_tab.dimensions' => 'Biểu tượng website có kích thước không hợp lệ.',
        ];
    }
    
}
