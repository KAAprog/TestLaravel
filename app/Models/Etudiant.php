<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Etudiant extends Model
{
   protected $fillable = ['nom', 'prenom', 'matricule', 'email', 'telephone'];
   
   public function inscriptions(): HasMany {
    return $this>hasMany(Inscription::class); }
   public function pointages(): HasMany    {
    return $this>hasMany(Pointage::class); }
   public function getNomCompletAttribute(): string     {
    return $this->prenom . ' ' . $this->nom;
   }
}
