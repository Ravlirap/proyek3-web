<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Menyimpan sesi scan AI per user beserta path gambar dan total kalori terdeteksi.
     */
    public function up(): void
    {
        Schema::create('scan_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('image_path');           // path relatif di storage/public/scan/
            $table->decimal('total_kalori', 10, 2)->default(0);
            $table->decimal('confidence', 5, 4)->default(0); // nilai 0.0000 – 1.0000
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scan_sessions');
    }
};
