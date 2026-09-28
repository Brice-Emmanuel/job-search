 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | INFORMATIONS PERSONNELLES
            |--------------------------------------------------------------------------
            */
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('telephone');
            $table->string('ville');
            $table->string('quartier');

            $table->enum('sexe', ['M', 'F']);

            $table->unsignedInteger('age')->nullable();

            /*
            |--------------------------------------------------------------------------
            | COMPTE
            |--------------------------------------------------------------------------
            */
            $table->enum('role', [
                'client',
                'travailleur'
            ])->default('client');

            $table->string('password');

            /*
            |--------------------------------------------------------------------------
            | INFORMATIONS PROFESSIONNELLES
            |--------------------------------------------------------------------------
            */
            $table->string('expertise')->nullable();

            $table->unsignedInteger('experience')
                ->nullable();

            $table->string('work_days')->nullable();

            $table->string('cv')->nullable();

            /*
            |--------------------------------------------------------------------------
            | DOCUMENTS DE VÉRIFICATION
            |--------------------------------------------------------------------------
            */

            // Numéro CNI
            $table->string('cni_number')->nullable();

            // Scan/photo de la CNI
            $table->string('cni_document')->nullable();

            // Plan de localisation
            $table->string('localisation_plan')->nullable();

            // Photo d'identité
            $table->string('photo_identite')->nullable();

            /*
            |--------------------------------------------------------------------------
            | JUSTIFICATIFS D'EXPÉRIENCE
            |--------------------------------------------------------------------------
            |
            | Plusieurs documents possibles :
            | certificat, attestation, ancien contrat, etc.
            |
            */
            $table->json('experience_documents')->nullable();

            /*
            |--------------------------------------------------------------------------
            | CONTACTS D'URGENCE
            |--------------------------------------------------------------------------
            */
            $table->string('emergency_contact_1_name')
                ->nullable();

            $table->string('emergency_contact_1_phone')
                ->nullable();

            $table->string('emergency_contact_2_name')
                ->nullable();

            $table->string('emergency_contact_2_phone')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | VÉRIFICATION DU COMPTE
            |--------------------------------------------------------------------------
            */
            $table->enum('verification_status', [
                'pending',
                'approved',
                'rejected',
            ])->default('pending');

            $table->boolean('est_verifie')
                ->default(false);

            /*
            |--------------------------------------------------------------------------
            | PHOTOS DU PROFIL
            |--------------------------------------------------------------------------
            */
            $table->string('avatar')->nullable();

            $table->string('cover_photo')->nullable();

            $table->rememberToken();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};