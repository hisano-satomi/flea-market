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
        <h2>会員登録</h2>
        <form method="POST" action="/register">
            @csrf
            <div>
                <label for="name">ユーザー名</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            </div>

            <div>
                <label for="email">メールアドレス</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div>
                <label for="password">パスワード</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div>
                <label for="password_confirmation">確認用パスワード</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <button type="submit">登録する</button>
        </form>

        <div class="login-link">
            <a href="{{ route('login') }}">ログインはこちら</a>
        </div>
    </main>
</body>
</html>