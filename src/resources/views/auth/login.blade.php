@extends('layouts.app')

@section('title', 'ログイン')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<h2>Login</h2>

<main>
    <form method="POST" action="{{ route('login.post') }}" class="form-box">
        @csrf

        <label for="email">メールアドレス</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="password">パスワード</label>
        <input type="password" name="password">
        @error('password')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">ログイン</button>
    </form>
    <!-- 会員登録リンク追加 -->
    <div class="register-link-container" style="margin-top: 20px; text-align:center;">
        <a href="{{ route('register') }}" class="register-link">会員登録はこちら</a>
    </div>
</main>
@endsection
