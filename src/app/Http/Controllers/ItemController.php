<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function topPageShow()
    {
        return view('top');
    }

    public function itemPageShow($id)
    {
        $item = Item::findOrFail($id);
        return view('item', compact('item'));
    }
}
