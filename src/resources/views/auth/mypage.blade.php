@extends('layouts.after-login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="user-info">
    <div class="profile-image">
        <img src="{{ isset(auth()->user()->profile) && auth()->user()->profile->icon ? asset('storage/profile_images/' . auth()->user()->profile->icon) : asset('images/noimage.png') }}" alt="Profile Image">
    </div>
    <div class="user-name">{{ auth()->user()->name }}</div>
    <div class="profile-edit">
        <a href="/profile">プロフィールを編集</a>
    </div>
</div>

<!-- タブナビゲーション -->
<div class="tab-navigation">
    <a href="/mypage?page=sell" class="tab-button {{ request('page', 'sell') === 'sell' ? 'active' : '' }}">
        出品した商品
    </a>
    <a href="/mypage?page=buy" class="tab-button {{ request('page') === 'buy' ? 'active' : '' }}">
        購入した商品
    </a>
</div>

<!-- 出品した商品タブのコンテンツ -->
@if(request('page', 'sell') === 'sell')
<div class="tab-content active" id="sell">
    <div class="items-grid">
        @if(isset($sellItems) && $sellItems->count() > 0)
            @foreach($sellItems as $item)
                <div class="item-card">
                    <a href="/item/{{ $item->id }}" class="item-link">
                        <div class="item-image">
                            <img src="{{ $item->img ? asset('storage/' . $item->img) : asset('images/noimage.png') }}" alt="{{ $item->name }}">
                            @if($item->is_sold)
                                <div class="sold-badge">SOLD</div>
                            @endif
                        </div>
                        <div class="item-info">
                            <h3 class="item-name">{{ $item->name }}</h3>
                            <p class="item-price">￥{{ number_format($item->price) }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <div class="no-items">
                <p>出品した商品がありません</p>
            </div>
        @endif
    </div>
</div>
@endif

<!-- 購入した商品タブのコンテンツ -->
@if(request('page') === 'buy')
<div class="tab-content active" id="buy">
    <div class="items-grid">
        @if(isset($buyItems) && $buyItems->count() > 0)
            @foreach($buyItems as $buyItem)
                <div class="item-card">
                    <a href="/item/{{ $buyItem->item->id }}" class="item-link">
                        <div class="item-image">
                            <img src="{{ $buyItem->item->img ? asset('storage/' . $buyItem->item->img) : asset('images/noimage.png') }}" alt="{{ $buyItem->item->name }}">
                            <div class="purchased-badge">購入済み</div>
                        </div>
                        <div class="item-info">
                            <h3 class="item-name">{{ $buyItem->item->name }}</h3>
                            <p class="item-price">￥{{ number_format($buyItem->item->price) }}</p>
                            <p class="purchase-date">購入日: {{ $buyItem->created_at->format('Y/m/d') }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <div class="no-items">
                <p>購入した商品がありません</p>
            </div>
        @endif
    </div>
</div>
@endif

@endsection