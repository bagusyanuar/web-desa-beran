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
        Schema::create('community_units', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('village_id')->nullable();
            $table->string('code');
            $table->string('leader_name')->nullable();
            $table->string('leader_contact')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('village_id')
                ->references('id')
                ->on('villages')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community_units');
    }
};
