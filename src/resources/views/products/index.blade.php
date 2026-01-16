@extends('layouts.app')

@section('title', '商品一覧')

@section('content')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">

<div class="product-page">

    <div class="tabs">
        <a href="#" class="tab active">おすすめ</a>
        <a href="#" class="tab">マイリスト</a>
    </div>

    @if ($products->isEmpty())
        <p style="text-align:center; margin-top:20px;">商品が見つかりませんでした。</p>
    @endif

    <div class="product-list">
        @foreach ($products as $product)
            <a href="{{ route('products.show', $product['id']) }}" class="product-card">
                <div class="product-image">
                <img src="{{ asset('storage/products/' . $product['image']) }}" alt="{{ $product['name'] }}">
                </div>
                <div class="product-name">{{ $product['name'] }}</div>
            </a>
        @endforeach
    </div>

</div>
@endsection
