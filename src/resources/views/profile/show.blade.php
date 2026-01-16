@extends('layouts.app')

@section('title', 'プロフィール')

@section('content')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

<div class="profile-area">
  <div class="profile-icon"></div>
  <div class="profile-name">ユーザー名</div>
  <button class="profile-edit">プロフィールを編集</button>
</div>

<div class="profile-tabs">
  <span class="tab active">出品した商品</span>
  <span class="tab">購入した商品</span>
</div>

<div class="product-list">
  @for ($i = 0; $i < 4; $i++)
    <div class="product-card">
      <div class="product-image"></div>
      <p class="product-name">商品名</p>
    </div>
  @endfor
</div>

@endsection
