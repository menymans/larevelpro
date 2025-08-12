<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovelasTable extends Migration
{
    public function up()
    {
        Schema::create('novelas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('genre');
            $table->text('description');
            $table->string('author');
            $table->date('release_date');
            $table->string('cover');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('novelas');
    }
}
