<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'icon' => 'image|mimes:jpeg,png|max:2048',
            'name' => 'required|string|max:20',
            'postcode' => 'required|string|max:10',
            'address' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'icon.image' => 'アイコンは画像ファイルである必要があります',
            'icon.mimes' => 'アイコンはjpeg、png形式の画像である必要があります',
            'icon.max' => 'アイコンは2MB以下のサイズである必要があります',
            'name.required' => 'ユーザー名を入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'address.required' => '住所を入力してください',
        ];
    }
}
