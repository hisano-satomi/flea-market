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
        @yield('content')
    </main>
</body>
</html>