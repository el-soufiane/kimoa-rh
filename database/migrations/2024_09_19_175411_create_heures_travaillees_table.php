<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeuresTravailleesTable extends Migration
{
    public function up()
    {
        Schema::create('heures_travaillees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employe_id')->constrained()->onDelete('cascade');
            $table->string('mois');
            $table->integer('heures_retard')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('heures_travaillees');
    }
}
