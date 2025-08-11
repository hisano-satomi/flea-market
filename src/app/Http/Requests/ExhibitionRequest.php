<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
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
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'img.required' => '画像を選択してください',
            'img.image' => '画像ファイルである必要があります',
            'img.mimes' => 'jpeg、png、jpg、gif形式の画像である必要があります',
            'img.max' => '2MB以下のサイズである必要があります',
            'name.required' => '商品名を入力してください',
            'description.required' => '商品説明を入力してください',
            'price.required' => '価格を入力してください',
            'category_id.required' => 'カテゴリを選択してください',
            'category_id.exists' => '選択したカテゴリは存在しません',
        ];
    }
}
