<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Http\Requests\ExhibitionRequest;

class ItemSellController extends Controller
{
    public function itemSellPageShow()
    {
        $categories = Category::all(); // 全カテゴリーを取得
        $conditions = Condition::all(); // 全コンディションを取得
        return view('auth.sell', compact('categories', 'conditions'));
    }

    public function itemSell(ExhibitionRequest $request)
    {
        // 認証状態を確認
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'ログインが必要です。');
        }
        
        // コンディションIDが実際に存在するかチェック
        $conditionExists = Condition::where('id', $request->condition)->exists();
        if (!$conditionExists) {
            return redirect()->back()->withErrors(['condition' => '無効なコンディションが選択されました。'])->withInput();
        }
        
        $conditionId = $request->condition;

        // 画像アップロード処理
        $imagePath = null;
        if ($request->hasFile('item_image')) {
            $imagePath = $request->file('item_image')->store('items', 'public');
        }

        // 商品を作成
        $item = Item::create([
            'user_id' => auth()->id(),
            'img' => $imagePath,
            'condition_id' => $conditionId,
            'name' => $request->item_name,
            'brand' => $request->brand_name,
            'description' => $request->item_description,
            'price' => $request->price,
        ]);

        // 全てのカテゴリーでitem_categoryレコードを作成
        foreach ($request->categories as $categoryId) {
            ItemCategory::create([
                'item_id' => $item->id,
                'category_id' => $categoryId,
            ]);
        }

        return redirect('/')->with('success', '商品を出品しました！');
    }
}