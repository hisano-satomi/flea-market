@extends('layouts.after-login')

@section('content')
<div class="container">
    <!-- タブナビゲーション -->
    <div class="tab-navigation">
        <a href="/" class="tab-button {{ request('tab', 'recommend') === 'recommend' ? 'active' : '' }}">
            おすすめ
        </a>
        <a href="/?tab=mylist" class="tab-button {{ request('tab') === 'mylist' ? 'active' : '' }}">
            マイリスト
        </a>
    </div>

    <!-- おすすめタブのコンテンツ -->
    @if(request('tab', 'recommend') === 'recommend')
    <div class="tab-content active" id="recommend">
        <div class="items-grid">
            <!-- 商品カード 1 -->
            <div class="item-card">
                <div class="item-image">
                    <img src="{{ asset('images/sample1.jpg') }}" alt="商品1">
                </div>
                <div class="item-info">
                    <h3 class="item-name">iPhone 14 Pro Max</h3>
                </div>
            </div>

            <!-- 商品カード 2 -->
            <div class="item-card">
                <div class="item-image">
                    <img src="{{ asset('images/sample2.jpg') }}" alt="商品2">
                </div>
                <div class="item-info">
                    <h3 class="item-name">ナイキ エアマックス</h3>
                </div>
            </div>
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
                    <div class="item-image">
                        <img src="{{ asset('images/favorite1.jpg') }}" alt="お気に入り1">
                        <div class="favorite-badge">♥</div>
                    </div>
                    <div class="item-info">
                        <h3 class="item-name">お気に入りの時計</h3>
                    </div>
                </div>

                <!-- お気に入り商品カード 2 -->
                <div class="item-card">
                    <div class="item-image">
                        <img src="{{ asset('images/favorite2.jpg') }}" alt="お気に入り2">
                        <div class="favorite-badge">♥</div>
                    </div>
                    <div class="item-info">
                        <h3 class="item-name">お気に入りのバッグ</h3>
                    </div>
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