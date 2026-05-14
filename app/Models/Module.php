<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Module extends Model
{
   // Laravel aurait pluriel "modules" par défaut — parfait ici
    protected $fillable = ['nom_module', 'volume_horaire', 'specialite_id', 'semestre_id'];
    public function specialite(): BelongsTo  { return $this>belongsTo(Specialite::class); }
    public function semestre(): BelongsTo    { return $this>belongsTo(Semestre::class); }
    public function cours(): HasMany          { return $this>hasMany(Cours::class); }
}
