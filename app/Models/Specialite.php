<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Specialite extends Model
{
   protected $fillable = ['nom_specialite', 'filiere_id'];
   public function filiere(): BelongsTo     {
    return $this->belongsTo(Filiere::class);
     }
   public function modules(): HasMany     {
    return $this->hasMany(Module::class);
    }
   public function inscriptions(): HasMany     {
     return $this->hasMany(Inscription::class);
    }
}
