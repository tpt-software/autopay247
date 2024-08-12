<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KycCccdRequest extends FormRequest
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
            'full_name' => 'required',
            'id_cccd' => 'required',
            'id_front' => 'required',
            'id_back' => 'required',
            'id_user' => 'required',
            'agree' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Vui lòng nhập Họ và tên',
            'id_cccd.required' => 'Mã ID không được để trống',
            'id_front.required' => 'Mặt trước ảnh không được để trống',
            'id_back.required' => 'Mặt sau ảnh không được để trống',
            'id_user.required' => 'Ảnh này không được để trống',
            'agree.required' => 'Vui lòng chọn đồng ý điều khoản'
        ];
    }
}
