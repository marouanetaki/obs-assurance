<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMedecinsTable extends Migration
{
    public function up()
    {
        Schema::table('medecins', function (Blueprint $table) {
            $table->unsignedBigInteger('specialite_id')->nullable();
            $table->foreign('specialite_id', 'specialite_fk_6854497')->references('id')->on('specialites');
        });
    }
}
