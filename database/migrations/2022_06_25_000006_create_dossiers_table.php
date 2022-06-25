<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossiersTable extends Migration
{
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('num_dossier')->unique();
            $table->date('date_soins');
            $table->decimal('frais_consultation', 15, 2)->nullable();
            $table->decimal('frais_analyse', 15, 2)->nullable();
            $table->decimal('frais_pharmacie', 15, 2)->nullable();
            $table->string('statut')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
