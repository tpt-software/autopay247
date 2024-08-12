<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoinRequest extends FormRequest
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
        if($this->request->get('_method')){
            return [
                "coin_name" => "required|max:255",
                "network_name" => "required|max:255",
                "address" => "required|max:255",
            ];
        }else {
            return [
                "coin_name" => "required|max:255",
                "network_name" => "required|max:255",
                "address" => "required|max:255",
                "image" => "required"
            ];
        }
    }
    public function messages(): array
    {
        return [
            "required" => "Trường bắt buộc",
            "max" => "Tối đa 255 kí tự"
        ];
    }
}