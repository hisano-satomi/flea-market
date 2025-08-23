<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/before-login.css') }}">
    @yield('css')
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
                    <input class="search-input" type="text" name="keyword" placeholder="なにをお探しですか？" value="{{ request('keyword') }}">
                </form>
            </div>
            
            <!-- ナビゲーション -->
            <nav class="header-nav">
                <a href="/login" class="header-nav-login">ログイン</a>
                <a href="/mypage" class="header-nav-mypage">マイページ</a>
                <a href="/sell" class="header-nav-sell">出品</a>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>