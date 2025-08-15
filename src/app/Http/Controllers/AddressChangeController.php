<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;

class AddressChangeController extends Controller
{
    public function addressChangePageShow(Request $request)
    {
        $user = auth()->user();
        $profile = $user->profile;
        $address = [
            'postcode' => session('buy_postcode', $profile ? $profile->postcode : ''),
            'address' => session('buy_address', $profile ? $profile->address : ''),
            'building' => session('buy_building', $profile ? $profile->building : ''),
        ];
        return view('auth.address', compact('address'));
    }

    public function addressChange(AddressRequest $request)
    {
        // 空でなければセッションに保存、空ならセッションから削除
        if (!empty($request->input('postcode'))) {
            session(['buy_postcode' => $request->input('postcode')]);
        } else {
            session()->forget('buy_postcode');
        }
        if (!empty($request->input('address'))) {
            session(['buy_address' => $request->input('address')]);
        } else {
            session()->forget('buy_address');
        }
        if (!empty($request->input('building'))) {
            session(['buy_building' => $request->input('building')]);
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
