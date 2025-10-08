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
        Schema::create('news_images', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('news_id')->nullable();
            $table->text('image')->nullable();
            $table->boolean('is_thumbnail')->default(false);
            $table->timestamps();
            $table->foreign('news_id')
                ->references('id')
                ->on('news')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_images');
    }
};
