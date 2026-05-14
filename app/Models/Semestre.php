<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Semestre extends Model
{
  protected $fillable = [
        'libelle',
        'numero',
        'niveau_id'
    ];

    public function niveau(): BelongsTo
    {
        return $this->belongsTo(Niveau::class);
    }
}
