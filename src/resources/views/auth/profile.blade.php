@extends('layouts.after-login')

@section('content')
    <h2>プロフィール</h2>
    <form method="POST" action="/profile" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div>
            <input type="file" name="profile_image" accept="image/*">
            @if(isset($user->profile_image))
                <div>
                    <p>現在の画像:</p>
                    <img src="{{ asset('storage/profile_images/' . $user->profile_image) }}" alt="プロフィール画像">
                </div>
            @endif
        </div>

        <div>
            <label for="name">ユーザー名</label>
            <input id="name" type="text" name="name" value="{{ old('name', auth()->user()->name) }}" autofocus>
            @error('name')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="postcode">郵便番号</label>
            <input id="postcode" type="text" name="postcode" value="{{ old('postcode', optional(auth()->user()->profile)->postcode) }}">
            @error('postcode')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="address">住所</label>
            <input id="address" type="text" name="address" value="{{ old('address', optional(auth()->user()->profile)->address) }}">
            @error('address')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="building">建物名</label>
            <input id="building" type="text" name="building" value="{{ old('building', optional(auth()->user()->profile)->building) }}">
            @error('building')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">更新する</button>
    </form>
@endsection
