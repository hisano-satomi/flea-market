<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coachtechフリマ</title>
    
</head>
<body>
    <header>
        <h1>
            <a href=""><img src="{{ asset('images/logo.svg') }}" alt="coachtechロゴ"></a>
        </h1>
    </header>
    <main>
        <h2>ログイン</h2>
        <form method="POST" action="/login">
            @csrf
            <div>
                <label for="email">メールアドレス</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div>
                <label for="password">パスワード</label>
                <input id="password" type="password" name="password" required>
            </div>

            <button type="submit">ログインする</button>
        </form>

        <div class="register-link">
            <a href="{{ route('register') }}">会員登録はこちら</a>
        </div>
    </main>
</body>
</html>