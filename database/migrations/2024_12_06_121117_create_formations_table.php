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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->integer('prix');
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->integer('place')->nullable();
            $table->string('lieu')->nullable();
            $table->string('objectif')->nullable();
            $table->string('description')->nullable();
            $table->integer('user');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
