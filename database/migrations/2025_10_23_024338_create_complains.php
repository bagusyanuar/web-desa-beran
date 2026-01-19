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
        Schema::create('complaints', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('reference_number')->unique()->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'approved', 'denied'])->default('pending');
            $table->text('response')->nullable();
            $table->uuid('approved_by_id')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
            $table->foreign('approved_by_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
