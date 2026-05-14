<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Salle extends Model
{
   use HasFactory;
   protected $table = 'salles';
   protected $fillable = ['nom_salle', 'capacite', 'batiment'];
   protected $attributes = ['capacite' => 30];
   }
