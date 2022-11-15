<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objetos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre', 70);
            $table->string('tipo', 30);
            $table->integer('cantidad');
            $table->string('fechacreacion', 30);
            $table->string('nombre_almacen', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objetos');
    }
};
