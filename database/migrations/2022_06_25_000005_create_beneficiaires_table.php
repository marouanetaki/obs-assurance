<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiairesTable extends Migration
{
    public function up()
    {
        Schema::create('beneficiaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->date('date_naissance');
            $table->string('lien_parente');
            $table->string('statut')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
