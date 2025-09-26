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
        Schema::create('micro_business_owners', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('micro_business_id')->unique('uniq_mbo_mcbu_id')->nullable();
            $table->string('name');
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->foreign('micro_business_id', 'fk_mbo_mcbu')
                ->references('id')
                ->on('micro_businesses')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('micro_business_owners');
    }
};
