<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossierMedicamentPivotTable extends Migration
{
    public function up()
    {
        Schema::create('dossier_medicament', function (Blueprint $table) {
            $table->unsignedBigInteger('dossier_id');
            $table->foreign('dossier_id', 'dossier_id_fk_6817849')->references('id')->on('dossiers')->onDelete('cascade');
            $table->unsignedBigInteger('medicament_id');
            $table->foreign('medicament_id', 'medicament_id_fk_6817849')->references('id')->on('medicaments')->onDelete('cascade');
        });
    }
}
