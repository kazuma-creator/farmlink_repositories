<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// productsテーブルにproduct_nameカラムを追加
return new class extends Migration {
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('product_name')->nullable()->after('item_id');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('product_name');
        });
    }
};
