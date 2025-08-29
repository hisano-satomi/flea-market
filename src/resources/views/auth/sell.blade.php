@extends('layouts.after-login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
<form action="/sell" method="POST" enctype="multipart/form-data" class="sell-form">
@csrf
    <h2>商品の出品</h2>
    <div class="item-img">
        <label for="img">商品画像</label>
        <div class="img-preview">
            <label for="img" class="custom-file-label">画像を選択する
                <input type="file" id="img" name="img" accept="image/*" style="display:none;">
            </label>
        </div>
        @error('img')
            <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>
    <div class="item-info">
        <h3 class="item-info__title">商品の詳細</h3>
        <label class="item-info__label" for="category">カテゴリー</label>
        <div class="category-checkboxes">
            @foreach($categories as $category)
                <div class="checkbox-item">
                    <input type="checkbox" 
                           id="category{{ $category->id }}" 
                           name="category[]" 
                           value="{{ $category->id }}">
                    <label for="category{{ $category->id }}">{{ $category->category }}</label>
                </div>
            @endforeach
            @error('category')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="item-condition">
            <h4 class="item-info__label">商品の状態</h4>
            <select id="condition" name="condition">
                @foreach($conditions as $condition)
                    <option value="{{ $condition->id }}">{{ $condition->condition }}</option>
                @endforeach
            </select>
            @error('condition')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>
        <h3 class="item-info__title">商品名と説明</h3>
        <div class="sell-inputs">
            <label class="item-info__label" for="name">商品名</label>
            <input type="text" id="name" name="name">
            @error('name')
                <div style="color:red;">{{ $message }}</div>
            @enderror

            <label class="item-info__label" for="brand_name">ブランド名</label>
            <input type="text" id="brand_name" name="brand_name">

            <label class="item-info__label" for="description">商品の説明</label>
            <textarea id="description" name="description" rows="4"></textarea>
            @error('description')
                <div style="color:red;">{{ $message }}</div>
            @enderror

            <label class="item-info__label" for="price">販売価格</label>
            <input type="number" id="price" name="price">
            @error('price')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary">出品する</button>
</form>
@endsection