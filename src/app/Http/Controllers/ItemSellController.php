<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\ItemCategory;

class ItemSellController extends Controller
{
    public function itemSellPageShow()
    {
        $categories = Category::all(); // 全カテゴリーを取得
        return view('auth.sell', compact('categories'));
    }

    public function itemSell(Request $request)
    {
        // 認証状態を確認
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'ログインが必要です。');
        }

        // 画像アップロード処理
        $imagePath = null;
        if ($request->hasFile('item_image')) {
            $imagePath = $request->file('item_image')->store('items', 'public');
        }

        // カテゴリーのバリデーション
        if (!$request->categories || !is_array($request->categories) || empty($request->categories)) {
            return redirect()->back()->withErrors(['categories' => 'カテゴリーを選択してください。'])->withInput();
        }

        // 画像アップロード処理
        $imagePath = null;
        if ($request->hasFile('item_image')) {
            $imagePath = $request->file('item_image')->store('items', 'public');
        }

        // 商品を作成
        $item = Item::create([
            'user_id' => auth()->id(),
            'img' => $imagePath,
            'condition_id' => 1, // 仮の値（後でconditionsテーブルとの関連を設定）
            'name' => $request->item_name,
            'brand' => $request->brand_name,
            'description' => $request->item_description,
            'price' => $request->price,
        ]);

        // 最初のカテゴリーでitem_categoryレコードを作成
        $itemCategory = ItemCategory::create([
            'item_id' => $item->id,
            'category_id' => $request->categories[0],
        ]);

        // itemsテーブルのitemcategory_idを更新
        $item->update([
            'itemcategory_id' => $itemCategory->id,
        ]);

        return redirect('/')->with('success', '商品を出品しました！');
    }
}
