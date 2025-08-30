@extends(auth()->check() ? 'layouts.after-login' : 'layouts.before-login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item.css') }}">
@endsection

@section('content')
<div class="item-page-wrapper">
    <div class="left-container">
        <div class="item-img">
            商品画像
            <img src="{{ $item->img ? asset('storage/' . $item->img) : asset('images/noimage.png') }}" alt="{{ $item->name }}">
        </div>
    </div>
    <div class="right-container">
        <h2>{{ $item->name }}</h2>

        <p class="brand-name">{{ $item->brand }}</p>

        <p class="price">￥{{ number_format($item->price) }} (税込)</p>
        
        <div class="count-container">
            <div class="favorite-info">
                <div class="favorite-icon">
                    @auth
                        @php
                            $isFavorited = $item->favorites->where('user_id', auth()->id())->count() > 0;
                        @endphp
                        <form method="POST" action="{{ $isFavorited ? route('favorite.destroy') : route('favorite.store') }}">
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $item->id }}">
                            <button type="submit" style="background:none;border:none;padding:0;cursor:pointer;">
                                @if($isFavorited)
                                    <span style="color: gold;">★</span>
                                @else
                                    <span style="color: gray;">☆</span>
                                @endif
                            </button>
                        </form>
                    @else
                        <span style="color: gray;">☆</span>
                    @endauth
                </div>
                <div class="favorite-count">{{ $item->favorites->count() }}</div>
            </div>
            <div class="comment-info">
                <div class="comment-icon">💬</div>
                <div class="comment-count">{{ $item->comments->count() }}</div>
            </div>
        </div>

        <form method="GET" action="/buy">
            <input type="hidden" name="item_id" value="{{ $item->id }}">
            <button class="buy-button" type="submit">購入手続きへ</button>
        </form>
        
        <div class="description-container">
            <h3>商品説明</h3>
            <p class="description">{{ $item->description }}</p>
        </div>

        < class="item-info">
            <h3>商品の情報</h3>

            <div class="item-category">
                <h4>カテゴリー</h4>
                <div class="category-list">
                    @foreach($item->categories as $category)
                        <span class="category-pill">{{ $category->category }}</span>
                    @endforeach
                </div>
            </div>

            <div class="item-condition">
                <h4>商品の状態</h4>
                <p>{{ $item->condition->condition ?? '' }}</p>
            </div>
        </div>

        <div class="comment-container">
            <h3>コメント</h3>
            @foreach($comments as $comment)
                <div class="comment-author">
                    <div class="comment-author__img">
                        <img src="{{ $comment->user->profile_image ?? asset('images/noimage.png') }}" alt="{{ $comment->user->name ?? '名無し' }}">
                    </div>
                    <div class="comment-author__name">{{ $comment->user->name ?? '名無し' }}</div>
                </div>
                <div class="comment-text">{{ $comment->comment }}</div>
            @endforeach
            <form method="POST" action="{{ route('comment.store') }}">
                @csrf
                <input type="hidden" name="item_id" value="{{ $item->id }}">
                <p>商品へのコメント</p>
                <textarea name="comment"></textarea>
                @error('comment')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
                <button class="comment-button" type="submit">コメントを送信する</button>
            </form>
        </div>
    
    </div>
</div>
@endsection