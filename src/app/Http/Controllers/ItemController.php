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
        return view('item', compact('item'));
    }
}
