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
        Schema::create('certificate_marital_status_applicants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('certificate_marital_status_id')->unique('uniq_cmsa_cms_id')->nullable();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->timestamps();
            $table->foreign('certificate_marital_status_id', 'fk_cmsa_cms')
                ->references('id')
                ->on('certificate_marital_statuses')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_marital_status_applicants');
    }
};
