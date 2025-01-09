<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->date('date');           // 出荷日
            $table->unsignedBigInteger('client_id');    // 取引先ID
            $table->unsignedBigInteger('cropping_id')->nullable(); // 作付ID
            $table->unsignedBigInteger('product_id')->nullable();  // 商品ID
            $table->decimal('unit_price', 8, 2);
            $table->decimal('quantity', 8, 2);
            $table->text('memo')->nullable();
            $table->timestamps();

            // 外部キー制約 (必要に応じて)
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('cropping_id')->references('id')->on('croppings')->onDelete('set null');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
