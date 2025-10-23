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
        Schema::create('complaint_images', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('complaint_id')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
            $table->foreign('complaint_id')->references('id')->on('complaints')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaint_images');
    }
};
