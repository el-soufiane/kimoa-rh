<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employe_id');
            $table->integer('heures_normales')->default(160); // Heures normales par mois
            $table->integer('heures_travaillees'); // Heures travaillées effectives
            $table->decimal('prime', 8, 2)->nullable(); // Prime, optionnelle
            $table->decimal('taux_horaire', 8, 2); // Taux horaire récupéré de la table contrats
            $table->decimal('total_a_payer', 10, 2); // Total calculé (taux_horaire * heures_travaillees + prime)
            $table->timestamps();

            // Clé étrangère vers la table employes
            $table->foreign('employe_id')->references('id')->on('employes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salary');
    }
}
