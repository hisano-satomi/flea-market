<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AddressChangeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ItemBuyController;
use App\Http\Controllers\ItemSellController;
use App\Http\Controllers\MypageController;


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
Route::get('/item/{id}', [ItemController::class, 'itemPageShow']);
Route::get('/buy/address', [AddressChangeController::class, 'addressChangePageShow']);
Route::get('/buy', [ItemBuyController::class, 'itemBuyPageShow']);
Route::get('/sell', [ItemSellController::class, 'itemSellPageShow']);
Route::get('/mypage', [MypageController::class, 'mypageShow'])->name('mypage');


// 認証が必要なルート
Route::middleware('auth')->group(function () {
    Route::get('/profile', [MypageController::class, 'mypageEditPageShow'])->name('profile');
    Route::put('/profile', [MypageController::class, 'mypageUpdate'])->name('profile.update');
});