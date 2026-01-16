@extends('layouts.app')

@section('content')
<div style="width:80%; margin:40px auto; display:flex; gap:40px; color:#333; background:#fff; padding:20px;">

    {{-- 左：商品画像 --}}
    <div style="flex:1;">
    <img
    src="{{ asset('storage/products/' . $product['image']) }}"
    alt="{{ $product['name'] }}"
    style="width: 100%; max-width: 400px; border-radius: 10px; object-fit: cover;"
>
    </div>

    {{-- 右：商品情報 --}}
    <div style="flex:1;">
        <h1 style="font-size:24px;">{{ $product['name'] }}</h1>
        <p>価格: ¥{{ number_format($product['price']) }}</p>
        <p>ブランド: {{ $product['brand'] }}</p>
        <p>状態: {{ $product['condition'] }}</p>
        <p>説明: {{ $product['description'] }}</p>

        {{-- 購入手続きボタン --}}
        <a href="{{ route('purchase', $product['id']) }}"
            style="
                display:inline-block;
                background:#ff4d4d;
                color:#fff;
                padding:12px 25px;
                border-radius:6px;
                font-size:16px;
                text-decoration:none;
                margin-top:20px;
            ">
            購入手続きへ
        </a>

        <br><br>

        <a href="{{ route('home') }}" style="color:#ff4d4d;">← 商品一覧に戻る</a>
    </div>

</div>
@endsection
