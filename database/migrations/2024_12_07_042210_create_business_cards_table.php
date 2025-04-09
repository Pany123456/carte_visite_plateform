<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('business_cards', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID unique pour chaque design
            $table->string('full_name'); // Nom du client ou du design
            $table->string('job_title')->nullable(); // Poste
            $table->string('company')->nullable(); // Entreprise
            $table->string('email'); // Email
            $table->string('phone'); // Téléphone
            $table->string('website')->nullable(); // Site web
            $table->string('address')->nullable(); // Adresse
            $table->string('template_name'); // Nom du template utilisé
            $table->json('colors')->nullable(); // Couleurs personnalisées en JSON
            $table->string('drive_link')->nullable(); // Lien Google Drive (optionnel)
            $table->boolean('is_active')->default(true); // Statut actif/inactif
            $table->unsignedBigInteger('user_id'); // Clé étrangère pour associer un client
            $table->timestamps();

            // Définition de la clé étrangère
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_cards');
    }
};
