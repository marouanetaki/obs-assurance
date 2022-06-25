<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('frais_rembourse', 15, 2);
            $table->string('mode_paiement');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
