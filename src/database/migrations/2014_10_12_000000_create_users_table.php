<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // 名前
            $table->string('email')->unique(); // メールアドレス
            $table->string('password'); // パスワード
            $table->string('nickname')->nullable(); // ニックネーム
            $table->text('bio')->nullable(); // 自己紹介
            $table->timestamps(); // created_at と updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
