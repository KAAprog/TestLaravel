<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inscription extends Model
{
    protected $fillable = ['date_inscription', 'etudiant_id', 'specialite_id','niveau_id', 'annee_academique_id',     ];

    protected $casts = ['date_inscription' => 'date'];

    public function etudiant(): BelongsTo   {
        return $this>belongsTo(Etudiant::class);
    }
    public function specialite(): BelongsTo {
        return $this>belongsTo(Specialite::class);
}
    public function niveau(): BelongsTo
    {
        return $this>belongsTo(Niveau::class); }
    public function anneeAcademique(): BelongsTo
    {
        return $this->belongsTo(AnneeAcademique::class);
     }
}
