<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransferRequest extends FormRequest
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
            'crypto_amount' => 'required',
            'amount_buy' => 'required',
            //'state' => 'required',
            'network_select' => 'required',
            'address_wallet' => 'required',
            //'estimated_price_input' => 'required',
        ];
    }

    public function messages(): array
{
    return [
        'amount_buy.required' => 'Vui lòng nhập số tiền bạn cần mua',
        'amount_buy.min' => 'Số tiền mua không được nhỏ hơn 360.000 vnd',
        'amount_buy.max' => 'Số tiền mua không được lơn hơn 300.000.000 vnd',
        'amount_buy.numeric' => 'Số tiền mua phải là số',
        'crypto_amount.required' => 'Số tiền nhận không được để trống',
        'network_select.required' => 'Mạng lưới không được để trống',
        'address_wallet.required' => 'Địa chỉ ví không được để trống',
    ];
}
}
