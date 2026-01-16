@extends('layouts.app')

@section('title', 'プロフィール編集')

@section('content')
<div class="profile-edit-container">
    <h2>プロフィール編集</h2>

    <form action="{{ route('profile.save') }}" method="POST">
        @csrf
        <label>名前</label>
        <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}">

        <label>ニックネーム</label>
        <input type="text" name="nickname" value="{{ old('nickname', auth()->user()->nickname) }}">

        <label>自己紹介</label>
        <textarea name="bio">{{ old('bio', auth()->user()->bio) }}</textarea>

        <button type="submit">更新する</button>
    </form>
</div>
@endsection
