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
        Schema::create('certificate_domicile_applicants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('certificate_domicile_id')->unique()->nullable();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->timestamps();
            $table->foreign('certificate_domicile_id')
                ->references('id')
                ->on('certificate_domiciles')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_domicile_applicants');
    }
};
