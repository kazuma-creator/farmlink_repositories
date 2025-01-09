<?php

// database/migrations/xxxx_xx_xx_create_seeds_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeedsTable extends Migration
{
    public function up()
    {
        Schema::create('seeds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id'); // items テーブルへの外部キー
            $table->date('purchase_date')->nullable(); // 購入日または棚卸日
            $table->decimal('content_volume', 8, 2)->nullable(); // 内容量
            $table->integer('quantity')->default(0); // 数量
            $table->date('expiry_date')->nullable(); // 採種年月又は有効期限
            $table->string('lot_number')->nullable(); // ロット番号
            $table->timestamps();
        
            // 外部キー制約
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('seeds');
    }
}
