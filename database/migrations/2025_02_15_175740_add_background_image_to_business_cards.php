<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('business_cards', function (Blueprint $table) {
            $table->string('background_image')->nullable()->after('photo_url'); // Ajoute la colonne après 'photo_url'
        });
    }

    public function down(): void
    {
        Schema::table('business_cards', function (Blueprint $table) {
            $table->dropColumn('background_image'); // Permet de revenir en arrière si nécessaire
        });
    }
};
