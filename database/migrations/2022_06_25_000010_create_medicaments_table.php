<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentsTable extends Migration
{
    public function up()
    {
        Schema::create('medicaments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('nom');
            $table->longText('presentation')->nullable();
            $table->decimal('prix', 15, 2)->nullable();
            $table->integer('taux');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
