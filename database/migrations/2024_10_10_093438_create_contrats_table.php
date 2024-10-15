<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employe_id')->constrained('employes')->onDelete('cascade'); // Associer un employé
            $table->foreignId('type_contrat_id')->constrained('type_contrats')->onDelete('cascade'); // Associer un type de contrat
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->string('fichier')->nullable(); // Chemin vers le fichier du contrat
            $table->decimal('taux_horaire', 8, 2); // Taux horaire
            $table->enum('observation', ['actif', 'suspendu', 'licencié'])->default('actif'); // État du contrat
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
        Schema::dropIfExists('contrats');
    }
}
