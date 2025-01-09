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
        Schema::create('harvest_batches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('harvest_id'); // 収穫記録ID
            $table->unsignedBigInteger('field_id'); // 圃場ID
            $table->decimal('quantity', 8, 2); // 収穫量
            $table->string('unit'); // 収穫量の単位
            $table->unsignedBigInteger('worker_id')->nullable(); // 作業者ID
            $table->unsignedBigInteger('equipment_id')->nullable(); // 機器設備ID
            $table->text('notes')->nullable(); // 備考
            $table->timestamps();

            $table->foreign('harvest_id')->references('id')->on('harvests')->onDelete('cascade');
            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade');
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('set null');
            $table->foreign('equipment_id')->references('id')->on('equipment')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harvest_batches');
    }
};
