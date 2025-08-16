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
        Schema::create('certificate_police_clearance_applicants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('certificate_police_clearance_id')->unique('uniq_cpca_cpc_id')->nullable();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->timestamps();
            $table->foreign('certificate_police_clearance_id', 'fk_cpca_cpc')
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
        Schema::dropIfExists('certificate_police_clearance_applicants');
    }
};
