<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
   
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ducumento');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('email');
            $table->string('telefono');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
