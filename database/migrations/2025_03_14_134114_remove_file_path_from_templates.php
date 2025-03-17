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
        Schema::table('templates', function (Blueprint $table) {
            $table->dropColumn('file_path');
        });
    }

    public function down()
    {
        Schema::table('templates', function (Blueprint $table) {
            $table->string('file_path'); // Ajoute à nouveau la colonne si tu veux pouvoir annuler la migration
        });
    }

};
