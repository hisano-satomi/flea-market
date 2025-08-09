<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\BuyItem;

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
        $user = auth()->user();
        $profile = $user->profile;

        return view('auth.buy', compact('item', 'profile', 'request'));
    }

    public function itemBuy(Request $request)
    {
        $item = Item::findOrFail($request->input('item_id'));
        $user = auth()->user();

        BuyItem::create([
            'user_id' => $user->id,
            'item_id' => $item->id,
            'payment_method' => $request->input('payment'),
            'send_postcode' => $request->input('send_postcode'),
            'send_address' => $request->input('send_address'),
            'send_building' => $request->input('send_building')
        ]);

        return redirect('/');
    }
}
