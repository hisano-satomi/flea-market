<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'payment' => 'required',
            'send_postcode' => 'required|string|max:10',
            'send_address' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'payment.required' => '支払い方法を選択してください',
            'send_postcode.required' => '郵便番号を入力してください',
            'send_address.required' => '住所を入力してください',
        ];
    }
}
