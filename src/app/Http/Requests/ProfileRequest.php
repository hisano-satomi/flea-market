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
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'postcode' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'icon.required' => 'アイコンを選択してください',
            'icon.image' => 'アイコンは画像ファイルである必要があります',
            'icon.mimes' => 'アイコンはjpeg、png、jpg、gif形式の画像である必要があります',
            'icon.max' => 'アイコンは2MB以下のサイズである必要があります',
            'postcode.required' => '郵便番号を入力してください',
            'address.required' => '住所を入力してください',
        ];
    }
}
