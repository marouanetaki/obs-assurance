<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDossiersTable extends Migration
{
    public function up()
    {
        Schema::table('dossiers', function (Blueprint $table) {
            $table->unsignedBigInteger('beneficiaire_id')->nullable();
            $table->foreign('beneficiaire_id', 'beneficiaire_fk_6756348')->references('id')->on('beneficiaires');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_6757311')->references('id')->on('users');
        });
    }
}
