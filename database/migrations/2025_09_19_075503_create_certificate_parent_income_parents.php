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
        Schema::create('certificate_parent_income_parents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('certificate_parent_income_id')->unique('uniq_cpipt_cpi_id')->nullable();
            $table->string('name');
            $table->string('identifier_number');
            $table->string('birth_place')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->enum('citizenship', ['indonesia', 'foreign']);
            $table->enum('religion', ['islam', 'kristen', 'katolik', 'hindu', 'budha', 'konghucu', 'other']);
            $table->enum('marriage', ['married', 'not-married']);
            $table->string('job')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
            $table->foreign('certificate_parent_income_id', 'fk_cpipt_cpi')
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
        Schema::dropIfExists('certificate_parent_income_parents');
    }
};
