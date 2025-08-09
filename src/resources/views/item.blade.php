@extends(auth()->check() ? 'layouts.after-login' : 'layouts.before-login')

@section('content')
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
    
    <div class="favorite-info">
        <div class="favorite-icon">★</div>
        <div class="favorite-count">1</div>
    </div>

    <div class="comment-info">
        <div class="comment-icon">💬</div>
        <div class="comment-count">1</div>
    </div>

    <form method="GET" action="/buy">
        <input type="hidden" name="item_id" value="{{ $item->id }}">
        <button type="submit">購入手続きへ</button>
    </form>
    
    <div class="description-container">
        <h3>商品説明</h3>
        <p class="description">{{ $item->description }}</p>
    </div>

    <div class="item-info">
        <h3>商品の情報</h3>
        <h4>カテゴリー</h4>
        <p>{{ $item->categories->pluck('category')->join(', ') }}</p>
        <h4>商品の状態</h4>
        <p>{{ $item->condition->condition ?? '' }}</p>
    </div>

    <div class="comment-container">
        <h3>コメント</h3>
        <div class="comment-author">コメントしたユーザー名</div>
        <div class="comment-text">コメント内容がここに入ります</div>
        <form method="POST" action="">
            @csrf
            <p>商品へのコメント</p>
            <textarea name="comment" placeholder="コメントを入力"></textarea>
            <button type="submit">コメントを送信する</button>
        </form>
    </div>
    
</div>
@endsection