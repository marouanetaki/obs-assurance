<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPrisesTable extends Migration
{
    public function up()
    {
        Schema::table('prises', function (Blueprint $table) {
            $table->unsignedBigInteger('beneficiaire_id')->nullable();
            $table->foreign('beneficiaire_id', 'beneficiaire_fk_6756442')->references('id')->on('beneficiaires');
            $table->unsignedBigInteger('clinique_id')->nullable();
            $table->foreign('clinique_id', 'clinique_fk_6794133')->references('id')->on('cliniques');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_6757313')->references('id')->on('users');
        });
    }
}
