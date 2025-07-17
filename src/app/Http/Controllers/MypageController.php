<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        // プロフィール画像のアップロード処理
        if ($request->hasFile('profile_image')) {
            // 古い画像があれば削除
            if ($user->profile_image) {
                Storage::disk('public')->delete('profile_images/' . $user->profile_image);
            }

            // 新しい画像を保存
            $image = $request->file('profile_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('profile_images', $imageName, 'public');
            $user->profile_image = $imageName;
        }

        // 他のフィールドを更新
        $user->name = $request->name;
        $user->postal_code = $request->postal_code;
        $user->address = $request->address;
        $user->building = $request->building;
        
        $user->save();

        return redirect()->route('profile')->with('success', 'プロフィールを更新しました。');
    }
}
