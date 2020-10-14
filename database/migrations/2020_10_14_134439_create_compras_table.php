<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_proveedores')->constrained('proveedores');
            $table->foreignId('id_usuarios')->constrained('users');
            $table->timestamps();
        });

        Schema::create('detalles_de_compras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cantidad');
            $table->foreignId('id_compras')->constrained('compras');
            $table->foreignId('id_productos')->constrained('productos');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('compras');
        Schema::dropIfExists('detalles_de_compras');
    }
}
