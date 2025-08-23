@extends('layouts.after-login')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
    <h2>プロフィール</h2>
    <form class="profile-form" method="POST" action="/profile" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <div class="profile-image-row">
                <div class="profile-image-preview">
                    <img id="profile-preview" src="{{ isset($user->profile_image) ? asset('storage/profile_images/' . $user->profile_image) : '' }}" alt="">
                </div>
                <label for="profile_image" class="custom-file-label">画像を選択する</label>
                <input type="file" name="profile_image" id="profile_image" accept="image/*" onchange="previewProfileImage(event)" style="display:none;">
            </div>
        </div>
        <script>
        function previewProfileImage(event) {
            const input = event.target;
            const preview = document.getElementById('profile-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.background = 'transparent';
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '';
                preview.style.background = '#D9D9D9';
            }
        }
        </script>

        <div class="form-group">
            <label for="name">ユーザー名</label>
            <input id="name" type="text" name="name" value="{{ old('name', auth()->user()->name) }}" autofocus>
            @error('name')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="postcode">郵便番号</label>
            <input id="postcode" type="text" name="postcode" value="{{ old('postcode', optional(auth()->user()->profile)->postcode) }}">
            @error('postcode')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">住所</label>
            <input id="address" type="text" name="address" value="{{ old('address', optional(auth()->user()->profile)->address) }}">
            @error('address')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="building">建物名</label>
            <input id="building" type="text" name="building" value="{{ old('building', optional(auth()->user()->profile)->building) }}">
            @error('building')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="update-btn">更新する</button>
    </form>
@endsection
