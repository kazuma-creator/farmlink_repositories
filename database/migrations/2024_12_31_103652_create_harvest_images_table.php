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
        Schema::create('harvest_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('harvest_batch_id'); // 収穫ロットID
            $table->string('image_path'); // 画像パス
            $table->timestamps();

            $table->foreign('harvest_batch_id')->references('id')->on('harvest_batches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harvest_images');
    }
};
