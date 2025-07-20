<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;

class MypageController extends Controller
{
    public function mypageEditPageShow()
    {
        $user = auth()->user();
        return view('auth.profile', compact('user'));
    }

    public function mypageUpdate(Request $request)
    {
        $user = auth()->user();
        
        $request->validate([
            'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // 2MB以下
            'name' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:8'],
            'address' => ['required', 'string', 'max:255'],
            'building' => ['nullable', 'string', 'max:255'],
        ]);

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

        return redirect()->route('profile')->with('success', 'プロフィールを更新しました。');
    }
}
