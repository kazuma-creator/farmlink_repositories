<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // 圃場テーブル
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // 露地または施設
            $table->string('name'); // 圃場名または施設名
            $table->float('area'); // 面積
            $table->string('area_unit'); // 単位（a, 反, m2）
            $table->string('ownership'); // 所有または借地
            $table->timestamps();
        });

        // 作業員テーブル
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('kana'); // よみがな
            $table->timestamps();
        });

        // 取引先テーブル
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('official_name');
            $table->string('kana'); // よみがな
            $table->string('app_registered_name'); // アプリ内登録名
            $table->timestamps();
        });

        // 品目テーブル
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('crop_name'); // 作物名
            $table->string('variety_name'); // 品種名
            $table->timestamps();
        });

        // 作業テーブル
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('crop_name'); // 作物名
            $table->string('task_name'); // 作業名
            $table->timestamps();
        });

        // 機械設備テーブル
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // 機械設備名
            $table->string('model'); // 型番形式
            $table->string('manufacturer'); // メーカー
            $table->string('fuel_type'); // 燃料の種類
            $table->date('acquisition_date'); // 取得日
            $table->decimal('unit_price', 10, 2); // 取引単価
            $table->timestamps();
        });

        // 商品テーブル
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('item'); // 品目
            $table->string('packaging'); // 包装容器
            $table->string('unit'); // 出荷単位
            $table->decimal('price', 10, 2); // 単価
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fields');
        Schema::dropIfExists('workers');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('items');
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('equipment');
        Schema::dropIfExists('products');
    }
};
