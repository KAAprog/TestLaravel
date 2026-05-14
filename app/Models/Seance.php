<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seance extends Model
{
    protected $fillable = [
        'date_seance', 'heure_debut', 'heure_fin',
        'cours_id', 'salle_id', 'enseignant_id',
        'semestre_id', 'annee_academique_id',
        ];
        protected $casts = [
        'date_seance' => 'date',
        'heure_debut' => 'string',
        'heure_fin'   => 'string',
        ];
        public function cours(): BelongsTo
        {
        return $this>belongsTo(Cours::class);
        }
        public function salle(): BelongsTo
        {
        return $this>belongsTo(Salle::class);
        }
        public function enseignant(): BelongsTo
        {
        return $this>belongsTo(Enseignant::class);
        }

        public function semestre(): BelongsTo
        {
        return $this>belongsTo(Semestre::class);
        }
        public function anneeAcademique(): BelongsTo
        {
        return $this->belongsTo(AnneeAcademique::class);
        }
        public function pointages(): HasMany
        {
        return $this>hasMany(Pointage::class);
    }
}
