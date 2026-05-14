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
        Schema::create('seances', function (Blueprint $table) {
            $table->id();$table->date('date_seance');         $table->time('heure_debut');
            $table->time('heure_fin');
            $table->foreignId('cours_id')->constrained('cours')->restrictOnDelete();
            $table->foreignId('salle_id')->constrained()->restrictOnDelete();
            $table->foreignId('enseignant_id')->constrained()->restrictOnDelete();
            $table->foreignId('semestre_id')->constrained()->restrictOnDelete();
            $table->foreignId('annee_academique_id')
                  ->constrained('annees_academiques')->restrictOnDelete();
            $table->timestamps();
            $table->unique(['salle_id', 'date_seance', 'heure_debut'],'uk_salle_creneau');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seances');
    }
};
