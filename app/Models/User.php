<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
    // Colonnes remplissables en masse
    protected $fillable = [
        'nom', 'prenom', 'login', 'email', 'password', 'role', 'statut',     ];
    // Colonnes cachées lors de la sérialisation JSON
        protected $hidden = [
        'password', 'remember_token',     ];
    // Cast automatique du hachage
        protected function casts(): array     {
            return [
                'password' => 'hashed',         ];
                 }
    // Helpers de rôle
         public function isDirecteur(): bool     {
            return $this->role === 'DIRECTEUR';
             }
        public function isResponsableAcademique(): bool     {
            return $this->role === 'RESPONSABLE_ACADEMIQUE';
             }
        public function isChargeDiscipline(): bool{
            return $this->role === 'CHARGE_DISCIPLINE';
             }
        public function getNomCompletAttribute(): string {
            return $this->prenom . ' ' . $this->nom; }
}

