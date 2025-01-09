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
        Schema::create('records_fertilizers_fields', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->date('date'); // 日付
            $table->unsignedBigInteger('cropping_id'); // 作付ID
            $table->string('fields_name'); // 圃場名
            $table->string('fertilizers_name'); // 肥料名
            $table->unsigedInteger('quantity'); // 肥料の量
            $table->string('unit'); // 単位(mg,g,kg)
            $table->string('farmer_name'); // 作業員
            $table->string('machine'); // 使用機械
            $table->text('memo')->nullable(); // メモ


            $table->foreign('cropping_id')->references('id')->on('croppings')->onDelete('cascade');
            $table->foreign('fields_name')->references('name')->on('fields')->onDelete('cascade');
            $table->foreign('fertilizers_name')->references('name')->on('fertilizers')->onDelete('cascade');
            $table->foreign('farmer_name')->references('name')->on('workers')->onDelete('cascade');
            $table->foreign('machine')->references('name')->on('equipment')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records_fertilizers_fields');
    }
};
