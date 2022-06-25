<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCliniquesTable extends Migration
{
    public function up()
    {
        Schema::create('cliniques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('email');
            $table->string('telephone');
            $table->string('adresse');
            $table->string('ville');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
