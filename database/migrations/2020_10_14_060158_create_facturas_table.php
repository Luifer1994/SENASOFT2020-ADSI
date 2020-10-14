<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_clientes')->constrained('clientes');
            $table->foreignId('id_usuarios')->constrained('users');
            $table->timestamps();
        });

        Schema::create('detalles_facturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cantidad');
            $table->foreignId('id_productos')->constrained('productos');
            $table->foreignId('id_facturas')->constrained('facturas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
        Schema::dropIfExists('detalles_facturas');
    }
}
