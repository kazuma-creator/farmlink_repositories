<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // 収穫記録テーブル
    public function up(): void
    {
        Schema::create('harvests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cropping_id'); // 作付ID
            $table->date('harvest_date'); // 収穫日
            $table->text('notes')->nullable(); // 備考
            $table->timestamps();

            $table->foreign('cropping_id')->references('id')->on('croppings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harvests');
    }
};
