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
        Schema::create('certificate_police_clearance_descriptions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('certificate_police_clearance_id')->nullable();
            $table->text('description');
            $table->timestamps();
            $table->foreign('certificate_police_clearance_id', 'fk_cpcd_cpc')
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
        Schema::dropIfExists('certificate_police_clearance_descriptions');
    }
};
