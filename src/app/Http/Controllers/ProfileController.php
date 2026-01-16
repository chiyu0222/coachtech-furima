<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // プロフィール設定フォームを表示
    public function showSetupForm()
    {
        return view('profile.setup');
    }

    // プロフィールを保存
    public function saveProfile(Request $request)
    {
        $request->validate([
            'nickname' => 'required|string|max:50',
            'bio' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $user->nickname = $request->nickname;
        $user->bio = $request->bio;
        $user->save();

        return redirect('/')->with('status', 'プロフィールを設定しました！');
    }
    public function show()
{
    $user = auth()->user();

    // 出品した商品
    $userProducts = $user->products()->get();

    // 購入した商品（product 情報つきで取得）
    $purchasedProducts = $user->purchases()
        ->with('product')
        ->get();

    return view('profile.show', compact('user', 'userProducts', 'purchasedProducts'));
}

public function edit()
{
    return view('profile.edit');
}



}
