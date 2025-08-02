<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ItemSellController extends Controller
{
    public function itemSellPageShow()
    {
        $categories = Category::all(); // 全カテゴリーを取得
        return view('auth.sell', compact('categories'));
    }
}
