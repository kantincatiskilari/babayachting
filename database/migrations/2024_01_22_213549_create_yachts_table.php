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
        Schema::create('yachts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('seo_title');
            $table->foreignId('yacht_type_id')->constrained('yacht_types')->onDelete('cascade');
            $table->integer('country');
            $table->string('trading_status');
            $table->integer('price');
            $table->string('currency');
            $table->string('banner_image');
            $table->string('thumbnail_image');
            $table->string('description');
            $table->integer('view')->default(0);
            $table->boolean('status')->default(1);
            $table->boolean('is_recommended');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yachts');
    }
};
