@extends('layouts.app')

@section('content')
<h2>メールアドレスを確認してください</h2>

<p>登録したメールに確認リンクを送りました。</p>
<p>届いていない場合は下のボタンで再送できます。</p>

<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit">確認メールを再送</button>
</form>
@endsection
