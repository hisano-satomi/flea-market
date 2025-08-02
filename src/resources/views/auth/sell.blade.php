@extends('layouts.after-login')

@section('content')
<form action="/sell" method="POST">
@csrf
    <h2>商品の出品</h2>
    <div class="item-img">
        <label for="item_image">商品画像</label>
        <input type="file" id="item_image" name="item_image" accept="image/*" required>
    </div>
    <div class="item-info">
        <h3>商品の詳細</h3>
        <label for="category">カテゴリー</label>
        <div class="category-checkboxes">
            @foreach($categories as $category)
                <div class="checkbox-item">
                    <input type="checkbox" 
                           id="category_{{ $category->id }}" 
                           name="categories[]" 
                           value="{{ $category->id }}">
                </div>
            @endforeach
        </div>
        <div class="item-condition">
            <h4>商品の状態</h4>
            <select id="condition" name="condition" required>
                <option value="new">良好</option>
                <option value="used">目立った傷や汚れなし</option>
                <option value="damaged">やや傷や汚れあり</option>
                <option value="destroyed">状態が悪い</option>
            </select>
        </div>
        <h3>商品名と説明</h3>
        <label for="item_name">商品名</label>
        <input type="text" id="item_name" name="item_name" required>
        
        <label for="brand_name">ブランド名</label>
        <input type="text" id="brand_name" name="brand_name">

        <label for="item_description">商品の説明</label>
        <textarea id="item_description" name="item_description" rows="4" required></textarea>

        <label for="price">販売価格</label>
        <input type="number" id="price" name="price" required>
    </div>
    <button type="submit" class="btn btn-primary">出品する</button>
</form>
@endsection