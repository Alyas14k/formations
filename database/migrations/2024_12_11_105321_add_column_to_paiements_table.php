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
        Schema::table('paiements', function (Blueprint $table) {
            //
            $table->integer('tranche')->nullable(); // 0->Tout Payé; 1->Payé par tranche
            $table->string('code')->nullable(); // numero de paiement


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paiements', function (Blueprint $table) {
            //
            $table->dropColumn('tranche');
            $table->dropColumn('code');


        });
    }
};
