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

Route::post('/buy', [ItemBuyController::class, 'itemBuy']);

// 認証が必要なルート
Route::middleware('auth')->group(function () {
    Route::get('/sell', [ItemSellController::class, 'itemSellPageShow']);
    Route::post('/sell', [ItemSellController::class, 'itemSell']);
    Route::get('/profile', [MypageController::class, 'mypageEditPageShow'])->name('profile');
    Route::put('/profile', [MypageController::class, 'mypageUpdate'])->name('profile.update');
    Route::get('/buy/address', [AddressChangeController::class, 'addressChangePageShow']);
    Route::post('/buy/address', [AddressChangeController::class, 'addressChange'])->name('buy.address.update');
    Route::get('/buy', [ItemBuyController::class, 'itemBuyPageShow']);
    
    Route::get('/mypage', [MypageController::class, 'mypageShow'])->name('mypage');
    // お気に入り登録・解除
    Route::post('/favorite', [FavoriteController::class, 'favoriteRegistration'])->name('favorite.store');
    Route::post('/favorite/delete', [FavoriteController::class, 'favoriteCancellation'])->name('favorite.destroy');
    // コメント登録
    Route::post('/comment', [CommentController::class, 'commentRegistration'])->name('comment.store');
});