<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrisesTable extends Migration
{
    public function up()
    {
        Schema::create('prises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('statut')->nullable();
            $table->string('type_operation');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
