<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTemplateIdToBusinessCards extends Migration
{
    public function up()
    {
        Schema::table('business_cards', function (Blueprint $table) {
            $table->unsignedBigInteger('template_id')->nullable()->after('id');
            $table->foreign('template_id')->references('id')->on('templates')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('business_cards', function (Blueprint $table) {
            $table->dropForeign(['template_id']);
            $table->dropColumn('template_id');
        });
    }
}
