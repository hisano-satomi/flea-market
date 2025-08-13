<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;
use App\Models\Item;
use App\Models\BuyItem;


class MypageController extends Controller
{
    public function mypageShow()
    {
        return view('auth.mypage');
    }

    public function mypageEditPageShow()
    {
        $user = auth()->user();
        return view('auth.profile', compact('user'));
    }

    public function mypageUpdate(ProfileRequest $request)
    {
        $user = auth()->user();

        // ユーザー名を更新
        $user->name = $request->name;
        $user->save();

        // プロフィール情報を更新または作成
        $profile = $user->profile ?? new Profile(['user_id' => $user->id]);
        
        $profile->postcode = $request->postal_code;
        $profile->address = $request->address;
        $profile->building = $request->building;
        
        if (!$profile->exists) {
            $user->profile()->save($profile);
        } else {
            $profile->save();
        }

        return redirect('/')->with('success', 'プロフィールを更新しました。');
    }
}
