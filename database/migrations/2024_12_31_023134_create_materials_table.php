<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // 資材名
            $table->date('purchased_date'); // 購入日/棚卸日
            $table->decimal('content_volume',8,2)->nullable(); // 内容量
            $table->string('unit')->nullable(); // 内容量の単位
            $table->integer('quantity')->default(0); // 数量
            $table->decimal('purchase_price',10,2)->nullable(); // 購入価格
            $table->string('supplier')->nullable(); // 仕入先
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
