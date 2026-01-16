@extends('layouts.app')

@section('title', '住所変更')

@section('content')
<div style="max-width:800px; margin:40px auto;">

    <h2 style="margin-bottom:20px; color:#333;">住所変更</h2>

    @if(session('success'))
        <p style="color:green; margin-bottom:20px;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('address.update') }}" method="POST">
        @csrf

        <div style="margin-bottom:15px;">
            <label style="display:block; margin-bottom:5px;">郵便番号</label>
            <input type="text" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}"
                   style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;">
        </div>

        <div style="margin-bottom:15px;">
            <label style="display:block; margin-bottom:5px;">住所</label>
            <input type="text" name="address" value="{{ old('address', $user->address) }}"
                   style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;">
        </div>

        <div style="margin-bottom:20px;">
            <label style="display:block; margin-bottom:5px;">建物名（任意）</label>
            <input type="text" name="building" value="{{ old('building', $user->building) }}"
                   style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;">
        </div>

        <button type="submit"
                style="background:#ff4d4d; color:white; padding:12px; border:none; border-radius:5px; width:100%; font-size:18px;">
            更新する
        </button>
    </form>
</div>
@endsection
