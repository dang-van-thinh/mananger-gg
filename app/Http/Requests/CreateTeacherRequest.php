<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTeacherRequest extends FormRequest
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
            'email' => 'required|email|unique:teachers,email', 
            'birth_day' => 'required|date|before_or_equal:today',
            'qualification' => 'required|string|max:255',
            'hourly_rate' => 'required|numeric|min:0',
            'phone' => 'required|string|max:14|regex:/^(\+?[\d\s\-]){7,15}$/|unique:teachers,phone',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'degree' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Không được bỏ trống tên giảng viên.',
            'name.string' => 'Tên giảng viên phải là một chuỗi ký tự.',
            'name.max' => 'Tên giảng viên không được vượt quá 255 ký tự.',
            'name.regex' => 'Tên giảng viên chỉ được phép chứa các ký tự chữ cái và khoảng trắng.',

            'email.required' => 'Không được bỏ trống email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',
            
            'birth_day.required' => 'Không được bỏ trống ngày tháng năm sinh.',
            'birth_day.date' => 'Ngày tháng năm sinh không hợp lệ.',
            'birth_day.before_or_equal' => 'Ngày tháng năm sinh không thể vượt quá ngày hiện tại.',
            
            'qualification.required' => 'Không được bỏ trống Thông tin chuyên môn.',
            'qualification.string' => 'Thông tin chuyên môn phải là một chuỗi ký tự.',
            'qualification.max' => 'Thông tin chuyên môn không được vượt quá 255 ký tự.',
            
            'hourly_rate.required' => 'Không được bỏ trống Lương theo giờ của giáo viên.',
            'hourly_rate.numeric' => 'Lương theo giờ phải là một số.',
            'hourly_rate.min' => 'Lương theo giờ phải lớn hơn hoặc bằng 0.',
            
            'phone.required' => 'Không được bỏ trống số điện thoại.',
            'phone.string' => 'Số điện thoại phải là một chuỗi ký tự.',
            'phone.max' => 'Số điện thoại không được vượt quá 14 ký tự.',
            'phone.unique' => 'số điện thoại đã tồn tại.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',

            
            'image.required' => 'Không được bỏ trống hình ảnh.',
            'image.image' => 'Tệp hình ảnh không hợp lệ.',
            'image.mimes' => 'Hình ảnh phải có định dạng jpg, jpeg, hoặc png.',
            
            'degree.required' => 'Không được bỏ trống Bằng cấp.',
            'degree.string' => 'Bằng cấp phải là một chuỗi ký tự.',
            'degree.max' => 'Bằng cấp không được vượt quá 255 ký tự.',
            
            'address.required' => 'Không được bỏ trống địa chỉ.',
            'address.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
        ];
    }
}
