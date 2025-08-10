<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function favoriteRegistration(Request $request)
    {
        $itemId = $request->input('item_id');
        $user = auth()->user();
        $user->favorites()->create(['item_id' => $itemId]);
        return back();
    }

    public function favoriteCancellation(Request $request)
    {
        $itemId = $request->input('item_id');
        $user = auth()->user();
        $user->favorites()->where('item_id', $itemId)->delete();
        return back();
    }
}
