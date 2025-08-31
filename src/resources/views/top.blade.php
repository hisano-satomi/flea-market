@extends(auth()->check() ? 'layouts.after-login' : 'layouts.before-login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection

@section('content')
<div class="container">
    <!-- タブナビゲーション -->
    <div class="tab-navigation">
        <a href="{{ isset($keyword) ? '/search?keyword=' . urlencode($keyword) : '/' }}" class="tab-button {{ request('tab', 'recommend') === 'recommend' ? 'active' : '' }}">
            おすすめ
        </a>
        <a href="{{ isset($keyword) ? '/search?tab=mylist&keyword=' . urlencode($keyword) : '/?tab=mylist' }}" class="tab-button {{ request('tab') === 'mylist' ? 'active' : '' }}">
            マイリスト
        </a>
    </div>

    <!-- おすすめタブのコンテンツ -->
    @if(request('tab', 'recommend') === 'recommend')
    <div class="tab-content active" id="recommend">
        <div class="items-grid">
            @foreach($items as $item)
            <!-- 商品カード -->
            <div class="item-card">
                <a href="/item/{{ $item->id }}" class="item-link">
                    <div class="item-image">
                        <img src="{{ $item->img ? asset('storage/' . $item->img) : asset('images/noimage.png') }}" alt="{{ $item->name }}">
                        @if($item->buyItem)
                            <div class="purchased-badge">購入済み</div>
                        @endif
                    </div>
                    <div class="item-info">
                        <h3 class="item-name">{{ $item->name }}</h3>
                        <p class="item-price">￥{{ number_format($item->price) }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- マイリストタブのコンテンツ -->
    @if(request('tab') === 'mylist')
    <div class="tab-content active" id="mylist">
        @auth
            <div class="items-grid">
                <!-- お気に入り商品カード 1 -->
                <div class="item-card">
                    <a href="/item/3" class="item-link">
                        <div class="item-image">
                            <img src="{{ asset('images/favorite1.jpg') }}" alt="お気に入り1">
                            <div class="favorite-badge">♥</div>
                        </div>
                        <div class="item-info">
                            <h3 class="item-name">お気に入りの時計</h3>
                        </div>
                    </a>
                </div>

                <!-- お気に入り商品カード 2 -->
                <div class="item-card">
                    <a href="/item/4" class="item-link">
                        <div class="item-image">
                            <img src="{{ asset('images/favorite2.jpg') }}" alt="お気に入り2">
                            <div class="favorite-badge">♥</div>
                        </div>
                        <div class="item-info">
                            <h3 class="item-name">お気に入りのバッグ</h3>
                        </div>
                    </a>
                </div>
            </div>
        @endauth
        @guest
            <div class="no-items">
                <p>マイリストはログイン後にご利用いただけます。</p>
                <a href="/login" class="login-link">ログインする</a>
            </div>
        @endguest
    </div>
    @endif
</div>
@endsection