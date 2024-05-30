<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrashTable extends Migration
{
    public function up()
    {
        Schema::create('trash', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('weight', 12, 2);
            $table->decimal('price', 12, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trash');
    }
};
