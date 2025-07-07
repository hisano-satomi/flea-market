<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AddressChangeController;
Use App\Http\Controllers\CommentController;
Use App\Http\Controllers\FavoriteController;
Use App\Http\Controllers\ItemBuyController;
Use App\Http\Controllers\ItemSellController;
Use App\Http\Controllers\MyPageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ItemController::class, 'topPageShow']);
Route::get('/item', [ItemController::class, 'itemPageShow']);
Route::get('/buy/address', [AddressChangeController::class, 'addressChangePageShow']);