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
        Schema::create('yacht_electronic_systems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('yacht_id')->constrained('yachts')->onDelete('cascade');
            $table->foreignId('system_id')->constrained('electronic_systems')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yacht_electronic_systems');
    }
};
