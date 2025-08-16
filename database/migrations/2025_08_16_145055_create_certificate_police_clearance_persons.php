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
        Schema::create('certificate_police_clearance_persons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('certificate_police_clearance_id')->unique('uniq_cpcp_cpc_id')->nullable();
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
            $table->foreign('certificate_police_clearance_id', 'fk_cpcp_cpc')
                ->references('id')
                ->on('certificate_police_clearances')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_police_clearance_persons');
    }
};
