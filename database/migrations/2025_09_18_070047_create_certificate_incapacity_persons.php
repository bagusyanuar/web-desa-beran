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
        Schema::create('certificate_incapacity_persons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('certificate_incapacity_id')->unique('uniq_cip_ci_id')->nullable();
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
            $table->foreign('certificate_incapacity_id', 'fk_cip_ci')
                ->references('id')
                ->on('certificate_incapacities')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_incapacity_persons');
    }
};
