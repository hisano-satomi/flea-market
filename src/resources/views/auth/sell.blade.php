@extends('layouts.after-login')

@section('content')
<form action="/sell" method="POST">
@csrf
    <h2>商品の出品</h2>
    <div class="item-img">
        <label for="img">商品画像</label>
        <input type="file" id="img" name="img" accept="image/*">
        @error('img')
            <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>
    <div class="item-info">
        <h3>商品の詳細</h3>
        <label for="category">カテゴリー</label>
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
            <h4>商品の状態</h4>
            <select id="condition" name="condition">
                @foreach($conditions as $condition)
                    <option value="{{ $condition->id }}">{{ $condition->condition }}</option>
                @endforeach
            </select>
            @error('condition')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>
        <h3>商品名と説明</h3>
        <label for="name">商品名</label>
        <input type="text" id="name" name="name">
        @error('name')
            <div style="color:red;">{{ $message }}</div>
        @enderror
        
        <label for="brand_name">ブランド名</label>
        <input type="text" id="brand_name" name="brand_name">

        <label for="description">商品の説明</label>
        <textarea id="description" name="description" rows="4"></textarea>
        @error('description')
            <div style="color:red;">{{ $message }}</div>
        @enderror

        <label for="price">販売価格</label>
        <input type="number" id="price" name="price">
        @error('price')
            <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">出品する</button>
</form>
@endsection