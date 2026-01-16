@extends('layouts.app')

@section('title', '商品購入')

@section('content')
<div style="background:white; color:black; padding:20px; min-height:100vh;">

    <!-- 左側：商品情報 -->
    <div class="left-area" style="flex:2;">
        <div class="product-box" style="display:flex; gap:20px; align-items:center; background:#fff; padding:20px; border-radius:10px;">

            <!-- 商品画像 -->
            <img
                src="{{ asset('storage/products/' . $product['image']) }}"
                alt="{{ $product['name'] }}"
                style="width: 100%; max-width: 400px; border-radius: 10px; object-fit: cover;"
            >

            <!-- 商品名と価格 -->
            <div class="product-info">
                <h2 class="product-name" style="font-size:22px; margin-bottom:10px;">
                    {{ $product['name'] }}
                </h2>
                <p class="product-price" style="font-size:20px; font-weight:bold;">
                    ¥{{ number_format($product['price']) }}
                </p>
            </div>
        </div>

        <!-- 支払い方法 -->
        <div class="payment-select-box" style="background:#fff; margin-top:25px; padding:20px; border-radius:10px;">
            <label for="payment_method" style="font-size:16px; font-weight:bold;">支払い方法</label>

            <!-- ▼▼ フォームの中に入れるため select はここでは閉じない ▼▼ -->
        </div>

        <!-- 配送先 -->
        <div class="address-box" style="background:#fff; margin-top:25px; padding:20px; border-radius:10px;">
            <p class="address-text">〒 {{ Auth::user()->postal_code }}</p>
            <p class="address-text">{{ Auth::user()->address }}</p>
            <p class="address-text">{{ Auth::user()->building }}</p>
            <a href="{{ route('address.edit') }}" class="address-change" style="color:#ff4d4d;">変更する</a>
        </div>
    </div>

    <!-- 右側：料金詳細 -->
    <div class="right-area" style="flex:1;">
        <div class="summary-box" style="background:#fff; padding:20px; border-radius:10px;">
            <div class="summary-row" style="display:flex; justify-content:space-between; margin-bottom:10px;">
                <span>商品代金</span>
                <span>¥{{ number_format($product['price']) }}</span>
            </div>

            <div class="summary-row border-top" style="display:flex; justify-content:space-between; margin-top:10px; padding-top:10px; border-top:1px solid #ddd;">
                <span>支払い方法</span>
                <span id="payment-preview">未選択</span>
            </div>
        </div>

        <!-- ▼▼ 購入フォーム ▼▼ -->
        <form action="{{ route('purchase.store', ['product_id' => $product['id']]) }}" method="POST">
    @csrf

    <label for="payment_method" style="font-size:16px; font-weight:bold;">支払い方法</label>
    <select id="payment_method" name="payment_method" style="width:100%; margin-top:10px; padding:10px;">
        <option value="">選択してください</option>
        <option value="convenience">コンビニ払い</option>
        <option value="credit">クレジットカード</option>
    </select>

    <button type="submit" class="purchase-button"
        style="
            width:100%;
            margin-top:20px;
            padding:15px;
            background:#ff4d4d;
            color:white;
            font-size:18px;
            border:none;
            border-radius:8px;
        ">
        購入する
    </button>
</form>


        <!-- ▲▲ 購入フォーム ▲▲ -->
    </div>

    <script>
        document.getElementById('payment_method').addEventListener('change', function () {
    document.getElementById('payment-preview').textContent =
        this.options[this.selectedIndex].text;
});

    </script>

</div>
@endsection
