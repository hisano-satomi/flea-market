@extends('layouts.after-login')

@section('content')
<form action="/buy" method="POST">
@csrf
<input type="hidden" name="item_id" value="{{ $item->id }}">
<input type="hidden" name="send_postcode" value="{{ session()->has('buy_postal_code') ? session('buy_postal_code') : $profile->postcode }}">
<input type="hidden" name="send_address" value="{{ session()->has('buy_address') ? session('buy_address') : $profile->address }}">
<input type="hidden" name="send_building" value="{{ session()->has('buy_building') ? session('buy_building') : $profile->building }}">
    <div class="left-container">
        <div class="item-info">
            <div class="item-img"></div>
            <h3>{{ $item->name }}</h3>
            <p>￥{{ number_format($item->price) }}</p>
        </div>
        <div class="item-payment">
            <h4>支払い方法</h4>
            <select id="payment" name="payment" required>
                <option value="convenience_store">コンビニ払い</option>
                <option value="credit_card">カード払い</option>
            </select>
        </div>
        <div class="send-address">
            <h4>配送先</h4>
            <a href="/buy/address?item_id={{ $item->id }}">変更する</a>
            <p>{{ session()->has('buy_postal_code') ? session('buy_postal_code') : $profile->postcode }}</p>
            <p>{{ session()->has('buy_address') ? session('buy_address') : $profile->address }}</p>
            <p>{{ session()->has('buy_building') ? session('buy_building') : $profile->building }}</p>
        </div>
    </div>
    <div class="right-container">
        <table>
            <tr>
                <th>商品代金</th>
                <td>￥{{ number_format($item->price) }}</td>
            </tr>
            <tr>
                <th>支払い方法</th>
                <td id="payment-method-text">コンビニ払い</td>
            </tr>
        </table>
            <button type="submit" class="btn btn-primary">購入する</button>
    </div>
</form>

<script>
document.getElementById('payment').addEventListener('change', function() {
    var text = this.value === 'credit_card' ? 'カード払い' : 'コンビニ払い';
    document.getElementById('payment-method-text').textContent = text;
});
</script>
@endsection