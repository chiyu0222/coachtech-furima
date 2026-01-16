<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;   // ← 追加
use App\Models\Product;    // ← 追加

class PurchaseController extends Controller
{
    public function store($id, Request $request)
{
    // バリデーション（支払い方法が空の場合エラー）
    $request->validate([
        'payment_method' => 'required'
    ]);

    // 購入する商品を取得
    $product = Product::findOrFail($id);

    // 購入情報を保存
    Purchase::create([
        'user_id'        => auth()->id(),
        'product_id'     => $id,
        'payment_method' => $request->payment_method,
        'price'          => $product->price,   // ← ここを追加！
    ]);

    return redirect()->route('purchase.complete');
}



    public function complete()
    {
        return view('purchase.complete');
    }
}
