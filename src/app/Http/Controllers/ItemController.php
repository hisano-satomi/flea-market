<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function topPageShow()
    {
        $items = Item::orderBy('created_at', 'desc')->get();
        return view('top', compact('items'));
    }

    public function itemPageShow($id)
    {
        $item = Item::findOrFail($id);
        $comments = $item->comments()->with('user')->latest()->get();
        return view('item', compact('item', 'comments'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $tab = $request->input('tab');
        if ($tab === 'mylist' && auth()->check()) {
            // お気に入り商品
            $favoriteItems = auth()->user()->favorites()->pluck('item_id')->toArray();
            $query = Item::whereIn('id', $favoriteItems);
            if ($keyword) {
                $query->where('name', 'like', "%" . $keyword . "%");
            }
            $items = $query->orderBy('created_at', 'desc')->get();
        } else {
            $query = Item::query();
            if ($keyword) {
                $query->where('name', 'like', "%" . $keyword . "%");
            }
            $items = $query->orderBy('created_at', 'desc')->get();
        }
        return view('top', compact('items', 'keyword', 'tab'));
    }
}
