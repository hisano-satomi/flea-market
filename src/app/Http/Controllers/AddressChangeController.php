<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddressChangeController extends Controller
{
    public function addressChangePageShow(Request $request)
    {
        // セッションに値があればそれを渡す
            $address = [
                'postal_code' => '',
                'address' => '',
                'building' => '',
            ];
        return view('auth.address', compact('address'));
    }

    public function addressChange(Request $request)
    {
        // バリデーション（全てnullable）
        $validated = $request->validate([
            'postal_code' => 'nullable',
            'address' => 'nullable',
            'building' => 'nullable',
        ]);
        // 空でなければセッションに保存、空ならセッションから削除
        if (!empty($validated['postal_code'])) {
            session(['buy_postal_code' => $validated['postal_code']]);
        } else {
            session()->forget('buy_postal_code');
        }
        if (!empty($validated['address'])) {
            session(['buy_address' => $validated['address']]);
        } else {
            session()->forget('buy_address');
        }
        if (!empty($validated['building'])) {
            session(['buy_building' => $validated['building']]);
        } else {
            session()->forget('buy_building');
        }
        // item_idをクエリパラメータで渡して購入画面にリダイレクト
        $itemId = $request->input('item_id');
        if ($itemId) {
            return redirect('/buy?item_id=' . $itemId);
        } else {
            return redirect('/buy');
        }
    }
}
