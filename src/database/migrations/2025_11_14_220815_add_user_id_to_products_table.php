<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('purchases', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');     // 誰が
        $table->unsignedBigInteger('product_id');  // どの商品を
        $table->integer('price');                  // 購入時の価格
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
    });
}


public function down()
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
    });
}
}
