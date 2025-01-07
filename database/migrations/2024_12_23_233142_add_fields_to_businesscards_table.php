<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('businesscards', function (Blueprint $table) {
            $table->json('social_links')->nullable(); // Liens réseaux sociaux
            $table->string('logo')->nullable(); // Chemin vers le logo
            $table->string('qr_code_url')->nullable(); // QR Code URL
            $table->string('photo_url')->nullable(); // URL de la photo/logo
            $table->string('description')->nullable();
            $table->string('whatsapp_number')->nullable(); // Numéro WhatsApp

            // Champs spécifiques aux particuliers
            $table->string('job_title')->nullable(); // Poste ou profession
            $table->text('personal_message')->nullable(); // Message personnalisé
            $table->date('date_of_birth')->nullable(); // Date de naissance
            $table->string('gender')->nullable(); // Sexe

            // Champs spécifiques aux entreprises
            $table->string('company_size')->nullable(); // Taille de l’entreprise
            $table->string('registration_number')->nullable(); // Numéro d’enregistrement
            $table->string('industry')->nullable(); // Secteur d’activité
            $table->string('tax_id')->nullable(); // Numéro fiscal
            $table->string('contact_person')->nullable(); // Contact au sein de l’entreprise
            $table->string('position_contact_person')->nullable(); // Poste du contact
            $table->json('additional_services')->nullable(); // Services/Produits
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('businesscards', function (Blueprint $table) {
            $table->dropColumn([
                 'social_links','qr_code_url', 'photo_url','description','whatsapp_number', 'job_title', 'personal_message',
                'date_of_birth', 'gender', 'company_size', 'registration_number',
                'industry', 'tax_id', 'contact_person', 'position_contact_person',
                'additional_services'
            ]);
        });
    }
};
