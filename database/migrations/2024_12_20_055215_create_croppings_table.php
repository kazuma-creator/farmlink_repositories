<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCroppingsTable extends Migration
{
    public function up()
    {
        Schema::create('croppings', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // 作付名
            $table->foreignId('item_id')->constrained('items'); // 品目ID
            $table->foreignId('field_id')->constrained('fields'); // 圃場ID
            $table->date('planting_date'); // 播種/定植日
            $table->decimal('expected_yield', 10, 2); // 収穫見込量
            $table->string('yield_unit'); // 単位（kg, t）
            $table->string('color'); // カラー
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('croppings');
    }
}
