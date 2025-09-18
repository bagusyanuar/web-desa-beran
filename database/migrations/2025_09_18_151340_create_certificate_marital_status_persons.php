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
        Schema::create('certificate_marital_status_persons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('certificate_marital_status_id')->unique('uniq_cmsp_cms_id')->nullable();
            $table->string('name');
            $table->string('identifier_number');
            $table->string('birth_place')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->enum('citizenship', ['indonesia', 'foreign']);
            $table->enum('religion', ['islam', 'kristen', 'katolik', 'hindu', 'budha', 'konghucu', 'other']);
            $table->enum('marriage', ['divorced', 'widowed']);
            $table->string('job')->nullable();
            $table->text('address')->nullable();
            $table->string('spouse_name')->nullable();
            $table->timestamps();
            $table->foreign('certificate_marital_status_id', 'fk_cmsp_cms')
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
        Schema::dropIfExists('certificate_marital_status_persons');
    }
};
