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
        Schema::create('certificate_parent_income_applicants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('certificate_parent_income_id')->unique('uniq_cpia_cpi_id')->nullable();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->timestamps();
            $table->foreign('certificate_parent_income_id', 'fk_cpia_cpi')
                ->references('id')
                ->on('certificate_parent_incomes')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_parent_income_applicants');
    }
};
