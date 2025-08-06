<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemBuyController extends Controller
{
    public function itemBuyPageShow(Request $request)
    {
        $itemId = $request->get('item_id');
        
        if (!$itemId) {
            // 商品IDがない場合はトップページにリダイレクト
            return redirect('/')->with('error', '商品が選択されていません');
        }
        
        $item = Item::findOrFail($itemId);
        
        return view('auth.buy', compact('item'));
    }
}
