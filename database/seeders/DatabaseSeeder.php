<?php
namespace Database\Seeders;
use App\Models\AnneeAcademique;
use App\Models\Filiere;
use App\Models\Niveau;
use App\Models\Semestre;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder {
    public function run(): void

    {
    // 1. Utilisateurs de base (un par rôle)

    User::create([
        'nom' => 'Admin',
        'prenom' => 'Système',
        'login' => 'admin', 'password' => Hash::make('admin123'),
        'role' => 'DIRECTEUR', 'statut' => 'ACTIF',
         ]);


    User::create([
         'nom' => 'Kamga', 'prenom' => 'Jean',
         'login' => 'respacad', 'password' => Hash::make('pass123'),
         'role' => 'RESPONSABLE_ACADEMIQUE', 'statut' => 'ACTIF',
         ]);

    User::create([
        'nom' => 'Ndoumbe', 'prenom' => 'Paul',
        'login' => 'surveillant', 'password' => Hash::make('pass123'),
        'role' => 'CHARGE_DISCIPLINE', 'statut' => 'ACTIF',
              ]);

        // 2. Niveaux

    foreach (['L1', 'L2', 'L3', 'M1', 'M2'] as $libelle) {

        Niveau::create(['libelle' => $libelle]);
         }

         // 3. Semestres (2 par niveau)

     $num = 1;
    foreach (Niveau::all() as $niveau) {
        Semestre::create(['libelle' => $niveau->libelle . ' S1',
            'numero' => $num++, 'niveau_id' => $niveau->id]);
        Semestre::create(['libelle' => $niveau->libelle . ' S2',
            'numero' => $num++, 'niveau_id' => $niveau->id]);
        }

        // 4. Filières de démonstration
    Filiere::create(['nom_filiere' => 'Informatique']);
    Filiere::create(['nom_filiere' => 'Gestion']);
    Filiere::create(['nom_filiere' => 'Génie Civil']);

        // 5. Année académique courante
    AnneeAcademique::create([ 'libelle'    => '2025-2026', 'date_debut' => '2025-10-01', 'date_fin'   => '2026-07-31', ]);
        }
}

