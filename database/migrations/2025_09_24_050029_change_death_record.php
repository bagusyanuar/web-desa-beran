<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('certificate_death_records', function (Blueprint $table) {
            $table->string('death_place')->nullable()->after('date');
            DB::statement("ALTER TABLE certificate_death_records MODIFY birth_order INT NULL");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('certificate_death_records', function (Blueprint $table) {
            $table->dropColumn('death_place');
            DB::statement("ALTER TABLE certificate_death_records MODIFY birth_order INT NOT NULL DEFAULT 1");
        });
    }
};
