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
            $table->integer('modify_by')->nullable(); // 0->Tout Payé; 1->Payé par tranche

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inscrits', function (Blueprint $table) {
            //
            $table->dropColumn('modify_by');

        });
    }
};
