@extends('layouts.after-login')

@section('content')
<div class="user-info">
    <div class="profile-image">
        <img src="" alt="Profile Image">
    </div>
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
                    <div class="item-image">
                        <img src="{{ asset('images/' . ($item->image ?? 'no-image.jpg')) }}" alt="{{ $item->name }}">
                        @if($item->is_sold)
                            <div class="sold-badge">SOLD</div>
                        @endif
                    </div>
                    <div class="item-info">
                        <h3 class="item-name">{{ $item->name }}</h3>
                        <p class="item-price">¥{{ number_format($item->price) }}</p>
                    </div>
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
                    <div class="item-image">
                        <img src="{{ asset('images/' . ($buyItem->item->image ?? 'no-image.jpg')) }}" alt="{{ $buyItem->item->name }}">
                        <div class="purchased-badge">購入済み</div>
                    </div>
                    <div class="item-info">
                        <h3 class="item-name">{{ $buyItem->item->name }}</h3>
                        <p class="item-price">¥{{ number_format($buyItem->item->price) }}</p>
                        <p class="purchase-date">購入日: {{ $buyItem->created_at->format('Y/m/d') }}</p>
                    </div>
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