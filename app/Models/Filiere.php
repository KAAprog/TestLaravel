<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Filiere extends Model
{
     use HasFactory;
    // Colonnes que l'on autorise à remplir en masse (create, update)
     protected $fillable = ['nom_filiere'];
     //Une filière possède plusieurs spécialités
     public function specialites(): HasMany { return $this->hasMany(Specialite::class); }
}
