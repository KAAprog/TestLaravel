<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
     protected $fillable = ['nom_module', 'volume_horaire', 'specialite_id', 'semestre_id'];

     public function specialite(): BelongsTo  {
        return $this>belongsTo(Specialite::class); }
     public function semestre(): BelongsTo    {
         return $this>belongsTo(Semestre::class); }
     public function cours(): HasMany          {
        return $this>hasMany(Cours::class); }
}
