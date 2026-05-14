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
        Schema::create('pointages', function (Blueprint $table) {
            $table->id();
             $table->enum('statut', ['Present', 'Absent', 'Retard'])->default('Absent');
             $table->text('observation')->nullable();
             $table->dateTime('date_pointage')->useCurrent();
             $table->foreignId('seance_id')->constrained()->cascadeOnDelete();
             $table->foreignId('etudiant_id')->constrained()->restrictOnDelete();
             $table->timestamps();
            $table->unique(['seance_id', 'etudiant_id'], 'uk_pointage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pointages');
    }
};
