<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $userID = $this->route('user');
        return [
            'name'     => 'required|max:255',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'email'    => 'required|max:255|email|unique:users,email,' . $userID,
            'password' => 'required|min:6',
            'phone'    => 'required|string|min:10|max:15|regex:/^(\+?[\d\s\-]){7,15}$/|unique:users,phone,' . $userID,
            'role_id'  => 'nullable',
            'active'   => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Tên không được để trống.',
            'name.max'          => 'Tên không được vượt quá 255 ký tự.',

            'image.image'       => 'Tệp phải là hình ảnh.',
            'image.mimes'       => 'Ảnh phải có định dạng jpg, jpeg, png, hoặc gif.',
            'image.max'         => 'Ảnh không được vượt quá 2MB.',

            'email.required'    => 'Email không được để trống.',
            'email.max'         => 'Email không được vượt quá 255 ký tự.',
            'email.email'       => 'Email không đúng định dạng.',
            'email.unique'      => 'Email này đã được sử dụng.',

            'password.required' => 'Mật khẩu không được để trống.',
            'password.min'      => 'Mật khẩu phải có ít nhất 6 ký tự.',

            'phone.required'    => 'Số điện thoại không được để trống.',
            'phone.unique'      => 'Số điện thoại này đã được sử dụng.',
            'phone.min'         => 'Số điện thoại phải có ít nhất 10 số.',
            'phone.max'         => 'Số điện thoại không được vượt quá 15 số.',
            'phone.regex'       => 'Số điện thoại không đúng định dạng.'
        ];
    }
}
