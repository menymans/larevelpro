<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_genres_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenresTable extends Migration
{
    public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // O cualquier otro campo que necesites
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('genres');
    }
}
