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
        Schema::create('certificate_income_applicants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('certificate_income_id')->unique('uniq_cica_cic_id')->nullable();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->timestamps();
            $table->foreign('certificate_income_id', 'fk_cica_cic')
                ->references('id')
                ->on('certificate_incomes')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_income_applicants');
    }
};
