<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'COACHTECH')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <header>
        <h1 style="margin:0;">
            <a href="{{ route('home') }}">COACHTECH</a>
        </h1>

        <form action="{{ route('home') }}" method="GET" class="search-form" style="display:flex; gap:8px;">
            <input type="text" name="search" placeholder="商品名で検索" value="{{ request('search') }}">
            <button type="submit">検索</button>
        </form>

        <div style="display:flex; gap:10px; align-items:center;">
    @auth
        <a href="{{ route('profile.show') }}">マイページ</a>

        <a href="{{ route('products.create') }}"
           style="background:#444; border:none; padding:6px 12px; border-radius:5px; color:white; cursor:pointer;">
            出品
        </a>

        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button style="background:#444; border:none; padding:6px 12px; border-radius:5px; color:white; cursor:pointer;">
                ログアウト
            </button>
        </form>
    @endauth

    @guest
        <a href="{{ route('login') }}" style="color:white;">ログイン</a>
        <a href="{{ route('register') }}" style="color:white;">登録</a>
    @endguest
</div>
</header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2025 COACHTECH</p>
    </footer>
    @yield('scripts')

</body>
</html>
