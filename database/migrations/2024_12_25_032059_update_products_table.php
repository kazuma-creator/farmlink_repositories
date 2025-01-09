<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id')->nullable()->after('id'); // 品目リレーション
            $table->integer('quantity')->nullable()->after('packaging'); // 入数
            $table->decimal('unit_weight', 10, 2)->nullable()->after('unit'); // 出荷単位重量

            // 外部キー制約
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');

            // 既存の 'item' 列を削除
            $table->dropColumn('item');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // 元に戻す処理
            $table->dropForeign(['item_id']);
            $table->dropColumn(['item_id', 'quantity', 'unit_weight']);
            $table->string('item')->after('id');
        });
    }
}
