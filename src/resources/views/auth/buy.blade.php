@extends('layouts.after-login')

@section('content')
<form action="/buy" method="POST">
@csrf
    <div class="left-container">
        <div class="item-info">
            <div class="item-img"></div>
            <h3>商品名</h3>
            <p>￥47,000</p>
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
            <a href="/buy/address">変更する</a>
            <p>郵便番号がはいります</p>
            <p>住所と建物名が入ります</p>
        </div>
    </div>
    <div class="right-container">
        <table>
            <tr>
                <th>商品代金</th>
                <td>￥47,000</td>
            </tr>
            <tr>
                <th>支払い方法</th>
                <td>コンビニ払い</td>
            </tr>
        </table>
            <button type="submit" class="btn btn-primary">購入する</button>
    </div>
</form>
@endsection