<?php

namespace App\Http\Requests\expense;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseRequest extends FormRequest
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
            'amount'         => 'required|numeric|min:0', 
            'title'          => 'required|max:255',
            'description'    => 'nullable|max:1000',
            'date'           => 'required|date',
            'paid_to'        => 'required|max:255',
            'payment_method' => 'required|max:255',
            'note'           => 'nullable|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'amount.required'         => 'Số tiền chi là bắt buộc.',
            'amount.numeric'          => 'Số tiền chi phải là một số.',
            'amount.min'              => 'Số tiền chi phải lớn hơn 0.',

            'title.required'          => 'Tiêu đề là bắt buộc.',
            'title.max'               => 'Tiêu đề không được vượt quá 255 ký tự.',

            'description.max'         => 'Thông tin chi tiết không được vượt quá 1000 ký tự.',

            'date.required'           => 'Ngày chi là bắt buộc.',
            'date.date'               => 'Ngày chi phải là một ngày hợp lệ.',

            'paid_to.required'        => 'Tên người nhận là bắt buộc.',
            'paid_to.max'             => 'Tên người nhận không được vượt quá 255 ký tự.',

            'payment_method.required' => 'Phương thức thanh toán là bắt buộc.',
            'payment_method.max'      => 'Phương thức thanh toán không được vượt quá 255 ký tự.',

            'note.max'                => 'Ghi chú không được vượt quá 1000 ký tự.',
        ];
    }
}
