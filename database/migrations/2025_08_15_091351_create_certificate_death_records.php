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
        Schema::create('certificate_death_records', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('certificate_death_id')->unique()->nullable();
            $table->timestamp('date');
            $table->string('district_name')->nullable();
            $table->string('city_name')->nullable();
            $table->string('province_name')->nullable();
            $table->text('cause_of_death')->nullable();
            $table->string('decider')->nullable();
            $table->text('post_mortem_notes')->nullable();
            $table->integer('birth_order')->default(1)->nullable();
            $table->timestamps();
            $table->foreign('certificate_death_id')->references('id')->on('certificate_deaths')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_death_records');
    }
};
