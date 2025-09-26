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
        Schema::create('micro_business_contacts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('micro_business_id')->nullable();
            $table->enum('type', ['phone' ,'whatsapp', 'email', 'telegram']);
            $table->string('value');
            $table->boolean('is_main')->default(false);
            $table->timestamps();
            $table->foreign('micro_business_id', 'fk_mbc_mcbu')
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
        Schema::dropIfExists('micro_business_contacts');
    }
};
