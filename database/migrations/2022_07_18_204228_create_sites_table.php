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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('municipio',60);
            $table->string('lugar',60);
            $table->string('nombre',60);
            $table->string('direccion',60);
            $table->string('telefono',20);
            $table->string('correo',100);
            $table->string('foto');
            $table->text('descripcion');
            $table->string('tipo_actividad',40);
            $table->string('horario_atencion',50);
            $table->integer('estado')->length(1);
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
        Schema::dropIfExists('sites');
    }
};
