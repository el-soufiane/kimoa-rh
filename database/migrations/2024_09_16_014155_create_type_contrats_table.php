<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeContratsTable extends Migration
{
    public function up()
    {
        Schema::create('type_contrats', function (Blueprint $table) {
            $table->id();
            $table->string('libellé');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('type_contrats');
    }
}
