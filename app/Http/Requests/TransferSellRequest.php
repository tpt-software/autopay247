<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class TransferSellRequest extends FormRequest
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
            'amount_sell' => 'required',
            'crypto_amount_sell' => 'required',
            'state_sell' => 'required',
            // 'estimated_price_input_sell' => 'required',
            'bank_number' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'amount_sell.required' => 'Vui lòng nhập số tiền bạn cần bán',
            'amount_sell.min' => 'Số tiền bán không được nhỏ hơn 360.000 vnd',
            'amount_sell.max' => 'Số tiền bán không được lơn hơn 300.000.000 vnd',
            'amount_sell.numeric' => 'Số tiền bán phải là số',
            'crypto_amount.required' => 'Số tiền nhận không được để trống',
            'network_select.required' => 'Mạng lưới không được để trống',
            'address_wallet.required' => 'Địa chỉ ví không được để trống',
            'bank_number.required' => 'Tài khoản không được để trống',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->expectsJson()) {
            throw new HttpResponseException(
                response()->json([
                    'message' => 'Validation failed',
                    'errors' => $validator->errors(),
                ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
            );
        }
        $url = route('transaction').'?#sell';
        // Customize the redirect response here
        throw new HttpResponseException(
            redirect()->to($url)
                ->withErrors($validator)
                ->withInput()
        );
    }
}
