<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\ArtisanProfile;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Catégories d'artisans
        $categories = [
            ['nom' => 'Plomberie', 'icone' => 'fa-faucet', 'nombre_professionnels' => 5],
            ['nom' => 'Électricité', 'icone' => 'fa-bolt', 'nombre_professionnels' => 4],
            ['nom' => 'Maçonnerie', 'icone' => 'fa-cubes', 'nombre_professionnels' => 3],
            ['nom' => 'Menuiserie', 'icone' => 'fa-hammer', 'nombre_professionnels' => 2],
            ['nom' => 'Peinture', 'icone' => 'fa-paint-roller', 'nombre_professionnels' => 3],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // 2. Créer un client de test
        User::create([
            'nom' => 'Kamga',
            'prenom' => 'Paul',
            'email' => 'client@jobsearch.cm',
            'telephone' => '699001122',
            'ville' => 'Douala',
            'quartier' => 'Akwa',
            'sexe' => 'M',
            'role' => 'client',
            'password' => Hash::make('password'),
            'est_verifie' => true,
        ]);

        // 3. Créer un artisan de test
        $artisanUser = User::create([
            'nom' => 'Tchinda',
            'prenom' => 'Jean',
            'email' => 'artisan@jobsearch.cm',
            'telephone' => '677334455',
            'ville' => 'Douala',
            'quartier' => 'Bonapriso',
            'sexe' => 'M',
            'role' => 'travailleur',
            'password' => Hash::make('password'),
            'est_verifie' => true,
        ]);

        ArtisanProfile::create([
            'user_id' => $artisanUser->id,
            'category_id' => 1,
            'bio' => 'Plombier expérimenté spécialisé dans la réparation de fuites et installations sanitaires.',
            'annees_experience' => 5,
            'tarif_horaire' => 5000,
            'disponible' => true,
        ]);
    }
}
