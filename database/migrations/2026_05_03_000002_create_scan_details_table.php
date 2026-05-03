<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Detail item makanan yang terdeteksi dalam satu sesi scan.
     */
    public function up(): void
    {
        Schema::create('scan_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scan_session_id')->constrained('scan_sessions')->cascadeOnDelete();
            $table->foreignId('food_id')->constrained('foods')->cascadeOnDelete();
            $table->decimal('jumlah_gram', 8, 2)->default(100);  // porsi dalam gram
            $table->decimal('total_kalori', 10, 2)->default(0);  // kalori = (jumlah_gram/100) * calories
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scan_details');
    }
};
