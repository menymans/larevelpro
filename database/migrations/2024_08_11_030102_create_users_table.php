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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID del usuario
            $table->string('name'); // Nombre del usuario
            $table->string('email')->unique(); // Correo electrónico único del usuario
            $table->string('password'); // Contraseña del usuario
            $table->rememberToken(); // Token para recordar al usuario (opcional)
            $table->timestamps(); // Timestamps para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
