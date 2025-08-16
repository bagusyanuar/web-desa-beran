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
        Schema::create('certificate_single_status_applicants', function (Blueprint $table) {
             $table->uuid('id')->primary();
            $table->uuid('certificate_single_status_id')->unique('uniq_cssa_css_id')->nullable();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->timestamps();
            $table->foreign('certificate_single_status_id', 'fk_cssa_css')
                ->references('id')
                ->on('certificate_single_statuses')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_single_status_applicants');
    }
};
