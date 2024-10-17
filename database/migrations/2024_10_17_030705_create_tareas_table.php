<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->string('picture', 512)->nullable();
            $table->integer('order')->default(1);
            $table->string('grupo',128)->nullable();
            $table->string('titulo', 128);
            $table->text('descripcion')->nullable();
            $table->enum('estado', ['pendiente', 'progreso', 'completado'])->default('pendiente');
            $table->date('fecha_creacion');
            $table->date('fecha_finalizacion')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('tareas');
    }
};
