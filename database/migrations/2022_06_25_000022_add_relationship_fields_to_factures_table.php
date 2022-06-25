<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFacturesTable extends Migration
{
    public function up()
    {
        Schema::table('factures', function (Blueprint $table) {
            $table->unsignedBigInteger('dossier_id')->nullable();
            $table->foreign('dossier_id', 'dossier_fk_6854499')->references('id')->on('dossiers');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_6854505')->references('id')->on('users');
        });
    }
}
