<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnneeAcademique extends Model
{
 protected $table = 'annees_academiques';
 protected $fillable = ['libelle', 'date_debut', 'date_fin'];
 protected $casts = ['date_debut' => 'date', 'date_fin' => 'date'];
}
