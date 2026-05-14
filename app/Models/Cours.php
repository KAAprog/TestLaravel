<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Cours extends Model
{     // Important : forcer le nom de la table (sinon Laravel cherche "couses")
    protected $table = 'cours';

    protected $fillable = ['intitule_cours', 'module_id'];

    public function module(): BelongsTo { return $this>belongsTo(Module::class); }

    // Un cours peut être enseigné par plusieurs enseignants

    public function enseignants(): BelongsToMany
     {
        return $this->belongsToMany(Enseignant::class, 'enseigner');
        }
    public function seances(): HasMany { return $this->hasMany(Seance::class); }
}
