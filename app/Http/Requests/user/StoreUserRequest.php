<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'     => 'required|max:255',
            'image'    => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'email'    => 'required|max:255|email|unique:users,email,',
            'password' => 'required',
            'phone'    => 'required|max:15|min:10|unique:users,phone,',
            'role_id'  => 'nullable',
        ];
    }

    public function messages()
    {
        return [
           'name.required'      => 'Tên không được để trống',
            'name.max'          => 'Tên không được dài quá 255 ký tự',
            'image.required'    => 'Tên không được để trống',
            'image.image'       => 'File phải là định dạng hình ảnh',
            'image.mimes'       => 'Ảnh phải có định dạng jpg, jpeg, png hoặc gif',
            'image.max'         => 'Ảnh không được vượt quá 2MB',
            'email.required'    => 'Email không được để trống',
            'email.max'         => 'Email không được dài quá 255 ký tự',
            'email.email'       => 'Email không đúng định dạng',
            'email.unique'      => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min'      => 'Mật khẩu phải có ít nhất 6 ký tự',
            'phone.required'    => 'Số điện thoại không được để trống',
            'phone.unique'      => 'Số điện thoại đã tồn tại',
            'phone.min'         => 'Số điện thoại tối thiểu 10 số',
            'phone.max'         => 'Số điện thoại tối đa 15 số',
        ];
    }
}
