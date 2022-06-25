<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccidentsTable extends Migration
{
    public function up()
    {
        Schema::create('accidents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lieu');
            $table->datetime('heure');
            $table->longText('cause');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
