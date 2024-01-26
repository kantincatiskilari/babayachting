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
        Schema::create('yacht_techincal_specifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('yacht_id')->constrained('yachts')->onDelete('cascade');
            $table->foreignId('specification_id')->constrained('technical_specifications')->onDelete('cascade');
            $table->string('specification_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yacht_techincal_specifications');
    }
};
