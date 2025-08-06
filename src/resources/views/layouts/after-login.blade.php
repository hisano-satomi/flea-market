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
        <div class="header-container">
            <h1>
                <a href="/"><img src="{{ asset('images/logo.svg') }}" alt="coachtechロゴ"></a>
            </h1>
            
            <!-- 検索フォーム -->
            <div class="search-form">
                <form method="GET" action="/search">
                    <input type="text" name="keyword" placeholder="なにをお探しですか？" value="{{ request('keyword') }}">
                    <button type="submit">🔍</button>
                </form>
            </div>
            
            <!-- ナビゲーション -->
            <nav class="header-nav">
                <a href="/mypage">マイページ</a>
                <a href="/sell">出品</a>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit">ログアウト</button>
                </form>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>