@extends('layouts.after-login')

@section('content')

<h2>住所の変更</h2>
<form method="POST" action="{{ route('buy.address.update') }}">
    <input type="hidden" name="item_id" value="{{ request('item_id') }}">
    @csrf
    <div>
        <label for="postcode">郵便番号</label>
    <input id="postcode" type="text" name="postcode" value="{{ $address['postcode'] }}" autocomplete="off">
    @error('postcode')
        <div style="color:red;">{{ $message }}</div>
    @enderror
    </div>
    <div>
        <label for="address">住所</label>
    <input id="address" type="text" name="address" value="{{ $address['address'] }}" autocomplete="off">
    @error('address')
        <div style="color:red;">{{ $message }}</div>
    @enderror
    </div>
    <div>
        <label for="building">建物名</label>
    <input id="building" type="text" name="building" value="{{ $address['building'] }}" autocomplete="off">
    </div>
    <button type="submit">更新する</button>
</form>

@endsection