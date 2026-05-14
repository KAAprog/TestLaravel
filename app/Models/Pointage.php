<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pointage extends Model
{
   protected $fillable = ['statut', 'observation', 'date_pointage', 'seance_id', 'etudiant_id'];

   protected $casts = ['date_pointage' => 'datetime'];
   
   public function seance(): BelongsTo
{
   return $this>belongsTo(Seance::class);
   }
   public function etudiant(): BelongsTo
   {
    return $this>belongsTo(Etudiant::class);
   }
}
