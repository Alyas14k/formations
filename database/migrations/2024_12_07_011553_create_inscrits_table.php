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
        Schema::create('inscrits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->integer('sexe'); // 0=>Masculin; 1=> Feminin
            $table->string('email')->nullable();
            $table->string('mobile_1'); // Un contact obligatoire
            $table->string('mobile_2')->nullable();
            $table->integer('formation_id'); // Id de la table formation
            $table->string('objectif')->nullable();
            $table->integer('statut'); // 0=>Non payé, 1=>Payer par tranche et 2=>Tout payé
            $table->integer('type'); // Ligne(1) ou Presentiel (0)
            $table->integer('user')->nullable(); // User si c'est en présentiel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nom_modeles');
    }
};
