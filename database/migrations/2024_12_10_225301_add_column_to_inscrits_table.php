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
        Schema::table('inscrits', function (Blueprint $table) {
            //
            $table->integer('type_formation')->nullable(); // 0->Presentiel; 1->Ligne
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inscrits', function (Blueprint $table) {
            //
            $table->dropColumn('type_formation');
        });
    }
};
