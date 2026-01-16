@extends('layouts.app')

@section('title', '会員登録')

@section('content')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<div class="register-container">
    <div class="register-box">
        <h2>会員登録</h2>
        <form method="POST" action="{{ route('register.post') }}">
            @csrf

            <label for="name">名前</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

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

            <label for="password_confirmation">パスワード確認</label>
            <input type="password" name="password_confirmation">

            <button type="submit">登録</button>
        </form>
    </div>
</div>
@endsection
