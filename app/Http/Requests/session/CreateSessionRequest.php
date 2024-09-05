<?php

namespace App\Http\Requests\session;

use Illuminate\Foundation\Http\FormRequest;

class CreateSessionRequest extends FormRequest
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
            'start_time' => 'required', 
            'end_time' => 'required',
                
        ];
    }
    public function messages(): array
    {
        return [
           'name.required' => 'Không được bỏ trống tên ca học.',
            
            'start_time.required' => 'Không được bỏ thời gian bắt dầu.',
            
            'end_time.required' => 'Không được bỏ trống thời gian kết thúc.',
        ];
    }
}
