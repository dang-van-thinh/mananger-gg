<?php

namespace App\Http\Requests\role;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
        $roleID = $this->route('role'); // lấy id của role từ route

        return [
            'name' => 'required|max:50|unique:roles,name,' . $roleID,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.max'      => 'Tên không quá 50 ký tự',
            'name.unique'   => 'Tên đã tồn tại'
        ];
    }
}
