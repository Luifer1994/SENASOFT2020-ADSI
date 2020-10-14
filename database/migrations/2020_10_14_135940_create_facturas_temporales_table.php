<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTemporalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas_temporales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cantidad');
            $table->foreignId('id_productos')->constrained('productos');
            $table->foreignId('id_usuarios')->constrained('users');
            $table->foreignId('id_clientes')->constrained('clientes');
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
        Schema::dropIfExists('facturas_temporales');
    }
}
