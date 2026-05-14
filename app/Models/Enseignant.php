<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Enseignant extends Model
{
   protected $fillable = ['nom', 'prenom', 'email', 'telephone', 'specialite_ens'];

   public function cours(): BelongsToMany
   {
     return $this->belongsToMany(Cours::class, 'enseigner');
       }
    public function seances(): HasMany
    {
        return $this->hasMany(Seance::class);
        }
    public function getNomCompletAttribute(): string     {
        return $this->prenom . ' ' . $this->nom;
        }
}
