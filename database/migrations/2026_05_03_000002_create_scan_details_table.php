<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Menyimpan detail setiap makanan yang terdeteksi oleh AI dalam satu sesi scan.
     * Satu scan_session dapat memiliki banyak scan_foods (multi-item detection).
     */
    public function up(): void
    {
        Schema::create('scan_foods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scan_session_id')->constrained('scan_sessions')->cascadeOnDelete();
            $table->string('food_name');
            $table->decimal('calories',                10, 2)->default(0);
            $table->decimal('protein',                 10, 2)->default(0);
            $table->decimal('carbs',                   10, 2)->default(0);
            $table->decimal('fat',                     10, 2)->default(0);
            $table->decimal('estimated_portion_grams', 10, 2)->default(100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scan_foods');
    }
};
