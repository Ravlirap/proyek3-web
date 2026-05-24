<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Menyimpan sesi scan AI per request.
     * user_id nullable → memungkinkan scan tanpa login (guest mode).
     */
    public function up(): void
    {
        Schema::create('scan_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('image_path');
            $table->decimal('total_calories', 10, 2)->default(0);
            $table->decimal('total_protein',  10, 2)->default(0);
            $table->decimal('total_carbs',    10, 2)->default(0);
            $table->decimal('total_fat',      10, 2)->default(0);
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
