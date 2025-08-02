<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemBuyController extends Controller
{
    public function itemBuyPageShow()
    {
        return view('auth.buy');
    }
}
