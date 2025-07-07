<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddressChangeController extends Controller
{
    public function addressChangePageShow()
    {
        return view('auth.address');
    }
}
