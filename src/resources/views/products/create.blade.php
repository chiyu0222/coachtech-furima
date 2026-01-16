@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/product-create.css') }}">
<div class="product-create-container">

    <h2 class="page-title">商品の出品</h2>

    {{-- 商品画像 --}}
    <div class="form-group">
        <label class="form-label">商品画像</label>
        <div class="image-upload-box">
            <input type="file" name="image" id="image" class="image-input">
            <label for="image" class="image-upload-label">画像を選択する</label>
        </div>
        {{--プレビュー --}}
    <img id="preview-image" style="max-width: 200px; margin-top: 10px; display: none;">

    </div>

    {{-- カテゴリー --}}
    <div class="form-group">
        <label class="form-label">商品の詳細</label>
        <div class="category-box">

            @foreach ([
                'レディース', 'メンズ', 'インテリア', 'レディースファッション',
                'メンズファッション', 'コスメ', 'ヘアケア', 'ペット用品',
                'ベビー・キッズ', 'スポーツ', 'キャンプ', 'ハンドメイド',
                'アクセサリー', 'おもちゃ', 'ベビー服', '本・雑誌', 'その他'
            ] as $category)
                <span class="category-tag">{{ $category }}</span>
            @endforeach

        </div>
    </div>

    {{-- 商品の状態 --}}
    <div class="form-group">
        <label class="form-label">商品の状態</label>
        <select name="condition" class="input-select">
            <option value="">選択してください</option>
            <option value="新品">新品</option>
            <option value="未使用に近い">未使用に近い</option>
            <option value="目立った傷や汚れなし">目立った傷や汚れなし</option>
            <option value="やや傷や汚れあり">やや傷や汚れあり</option>
            <option value="状態が悪い">状態が悪い</option>
        </select>
    </div>

    {{-- 商品名など --}}
    <div class="form-group">
        <label class="form-label">商品名</label>
        <input type="text" class="input-text">
    </div>

    <div class="form-group">
        <label class="form-label">ブランド名</label>
        <input type="text" class="input-text">
    </div>

    <div class="form-group">
        <label class="form-label">商品の説明</label>
        <textarea class="input-textarea"></textarea>
    </div>

    <div class="form-group">
        <label class="form-label">販売価格</label>
        <input type="number" class="input-text" placeholder="￥">
    </div>

    <button class="submit-btn">出品する</button>

</div>
@endsection

@section('scripts')
<script>
document.getElementById("image").addEventListener("change", function(e){
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(event){
        const img = document.getElementById("preview-image");
        img.src = event.target.result;
        img.style.display = "block";
    };
    reader.readAsDataURL(file);
});
</script>
@endsection


