@extends('layouts.app')

@section('title', 'プロフィール編集')

@section('content')

<head>
  <meta charset="UTF-8">
  <title>プロフィール</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="header">
  <div class="logo">CT COACHTECH</div>
  <input class="search" placeholder="なにをお探しですか？">
  <div class="menu">
    <a href="#">ログアウト</a>
    <a href="#">マイページ</a>
    <button class="sell">出品</button>
  </div>
</header>

<section class="profile">
  <div class="icon"></div>
  <div class="username">ユーザー名</div>
  <button class="edit">プロフィールを編集</button>
</section>

<nav class="tabs">
  <span class="active">出品した商品</span>
  <span>購入した商品</span>
</nav>

<section class="products">
  <div class="card">
    <div class="image">商品画像</div>
    <p>商品名</p>
  </div>
  <!-- 同じものを複製 -->
</section>

</body>

@endsection
