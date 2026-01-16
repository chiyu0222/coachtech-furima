<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// TOP（商品一覧）
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// 認証
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// プロフィール初期設定
Route::middleware('auth')->group(function () {

    Route::get('/profile/setup', [ProfileController::class, 'showSetupForm'])->name('profile.setup');
    Route::post('/profile/setup', [ProfileController::class, 'saveProfile'])->name('profile.save');

    // メール認証
    Route::get('/email/verify', fn() => view('auth.verify-email'))->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/');
    })->middleware('signed')->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', '確認メールを再送しました！');
    })->middleware('throttle:6,1')->name('verification.send');

    // 住所
    Route::get('/address/edit', [AddressController::class, 'edit'])->name('address.edit');
    Route::post('/address/update', [AddressController::class, 'update'])->name('address.update');

    // プロフィール
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // 購入
    Route::get('/purchase/{id}', [ProductController::class, 'purchase'])->name('purchase');
    Route::post('/purchase/{product_id}', [PurchaseController::class, 'store'])->name('purchase.store');

    Route::get('/purchase/complete', [PurchaseController::class, 'complete'])->name('purchase.complete');

    // 商品出品
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
});

// 商品詳細（最後に定義）
Route::get('/products/{id}', [ProductController::class, 'show'])
    ->whereNumber('id')
    ->name('products.show');
