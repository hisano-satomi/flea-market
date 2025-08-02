@extends('layouts.after-login')

@section('content')

<h2>住所の変更</h2>
<form method="POST" action="/address">
    @csrf
    @method('PUT')

    <div>
        <label for="postal_code">郵便番号</label>
        <input id="postal_code" type="text" name="postal_code" value="" required>
    </div>

    <div>
        <label for="address">住所</label>
        <input id="address" type="text" name="address" value="" required>
    </div>

    <div>
        <label for="building">建物名</label>
        <input id="building" type="text" name="building" value="">
    </div>

    <button type="submit">更新する</button>
</form>

@endsection