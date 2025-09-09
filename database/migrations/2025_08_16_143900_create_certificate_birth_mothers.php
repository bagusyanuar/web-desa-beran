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
        Schema::create('certificate_birth_mothers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('certificate_birth_id')->unique()->nullable();
            $table->string('name');
            $table->string('identifier_number');
            $table->string('birth_place')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('citizenship', ['indonesia', 'foreign']);
            $table->enum('religion', ['islam', 'kristen', 'katolik', 'hindu', 'budha', 'konghucu', 'other']);
            $table->string('job')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
            $table->foreign('certificate_birth_id')->references('id')->on('certificate_births')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_birth_mothers');
    }
};
