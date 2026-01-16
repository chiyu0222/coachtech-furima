<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    // 住所変更フォーム表示
    public function edit()
    {
        $user = Auth::user();
        return view('address.edit', compact('user'));
    }

    // 更新処理
    public function update(Request $request)
    {
        $request->validate([
            'postal_code' => 'required',
            'address'     => 'required',
            'building'    => 'nullable'
        ]);

        $user = Auth::user();
        $user->postal_code = $request->postal_code;
        $user->address = $request->address;
        $user->building = $request->building;
        $user->save();

        return redirect()->back()->with('success', '住所を更新しました');
    }
}
