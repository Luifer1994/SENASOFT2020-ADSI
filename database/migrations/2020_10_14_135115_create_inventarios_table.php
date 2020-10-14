<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_sucursales');
            $table->timestamps();
        });

        Schema::create('detalles_de_inventarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cantidad');
            $table->foreignId('id_inventarios')->constrained('inventarios');
            $table->foreignId('id_productos')->constrained('productos');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('inventarios');
        Schema::dropIfExists('detalles_de_inventarios');
    }
}
