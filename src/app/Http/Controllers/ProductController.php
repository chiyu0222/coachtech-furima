<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products = [
        [
            'id' => 1,
            'name' => '腕時計',
            'price' => 15000,
            'brand' => 'Rolax',
            'description' => 'スタイリッシュなデザインのメンズ腕時計',
            'image' => '1.jpg',
            'condition' => '良好'
        ],
        [
            'id' => 2,
            'name' => 'HDD',
            'price' => 5000,
            'brand' => '西芝',
            'description' => '高速で信頼性の高いハードディスク',
            'image' => '2.jpg',
            'condition' => '目立った傷や汚れなし'
        ],
        [
            'id' => 3,
            'name' => '玉ねぎ3束',
            'price' => 300,
            'brand' => 'なし',
            'description' => '新鮮な玉ねぎ3束のセット',
            'image' => '3.jpg',
            'condition' => 'やや傷や汚れあり'
        ],
        [
            'id' => 4,
            'name' => '革靴',
            'price' => 4000,
            'brand' => '',
            'description' => 'クラシックなデザインの革靴',
            'image' => '4.jpg',
            'condition' => '状態が悪い'
        ],
        [
            'id' => 5,
            'name' => 'ノートPC',
            'price' => 45000,
            'brand' => '',
            'description' => '高性能なノートパソコン',
            'image' => '5.jpg',
            'condition' => '良好'
        ],
        [
            'id' => 6,
            'name' => 'マイク',
            'price' => 8000,
            'brand' => 'なし',
            'description' => '高音質のレコーディング用マイク',
            'image' => '6.jpg',
            'condition' => '目立った傷や汚れなし'
        ],
        [
            'id' => 7,
            'name' => 'ショルダーバッグ',
            'price' => 3500,
            'brand' => '',
            'description' => 'おしゃれなショルダーバッグ',
            'image' => '7.jpg',
            'condition' => 'やや傷や汚れあり'
        ],
        [
            'id' => 8,
            'name' => 'タンブラー',
            'price' => 500,
            'brand' => 'なし',
            'description' => '使いやすいタンブラー',
            'image' => '8.jpg',
            'condition' => '状態が悪い'
        ],
        [
            'id' => 9,
            'name' => 'コーヒーミル',
            'price' => 4000,
            'brand' => 'Starbacks',
            'description' => '手動のコーヒーミル',
            'image' => '9.jpg',
            'condition' => '良好'
        ],
        [
            'id' => 10,
            'name' => 'メイクセット',
            'price' => 2500,
            'brand' => '',
            'description' => '便利なメイクアップセット',
            'image' => '10.jpg',
            'condition' => '目立った傷や汚れなし'
        ],
    ];

    public function index()
    {
        $products = collect($this->products);
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = collect($this->products)->firstWhere('id', (int)$id);

        if (!$product) {
            abort(404);
        }

        return view('products.show', compact('product'));
    }

    public function purchase($id)
    {
        $product = collect($this->products)->firstWhere('id', (int)$id);

        if (!$product) {
            abort(404);
        }

        return view('products.purchase', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // あとで保存処理
        return redirect()->route('products.index')
                         ->with('success', '商品を登録しました！（実際の保存処理はまだ）');
    }

}
