<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function topPageShow()
    {
        return view('top');
    }

    public function itemPageShow()
    {
        return view('item');
    }
}
