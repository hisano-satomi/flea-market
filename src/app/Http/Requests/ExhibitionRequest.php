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
            'item_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|exists:categories,id',
            'condition' => 'required|exists:conditions,id',
        ];
    }

    public function messages()
    {
        return [
            'item_image.required' => '画像を選択してください',
            'item_image.image' => '画像ファイルである必要があります',
            'item_image.mimes' => 'jpeg、png、jpg、gif形式の画像である必要があります',
            'item_image.max' => '2MB以下のサイズである必要があります',
            'name.required' => '商品名を入力してください',
            'description.required' => '商品説明を入力してください',
            'price.required' => '価格を入力してください',
            'category.required' => 'カテゴリを選択してください',
            'category.exists' => '選択したカテゴリは存在しません',
            'condition.required' => '商品の状態を選択してください',
            'condition.exists' => '選択した商品の状態は存在しません',
        ];
    }
}
