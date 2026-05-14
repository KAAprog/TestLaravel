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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->date('date_inscription');
            $table->foreignId('etudiant_id')->constrained()->restrictOnDelete();
            $table->foreignId('specialite_id')->constrained()->restrictOnDelete();
            $table->foreignId('niveau_id')->constrained('niveaux')->restrictOnDelete();
            $table->foreignId('annee_academique_id')
                  ->constrained('annees_academiques')->restrictOnDelete();
            $table->timestamps();

            $table->unique(['etudiant_id', 'specialite_id', 'annee_academique_id'], 'uk_inscription');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
