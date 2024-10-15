<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employe_id')->constrained()->onDelete('cascade'); // Relation avec employé
            $table->enum('libelle', ['congé', 'maladie', 'sans solde']); // Liste déroulante pour les types de permissions
            $table->date('date_debut');
            $table->date('date_fin')->nullable(); // Peut être null si la permission n'est pas encore terminée
            $table->text('motif')->nullable(); // Motif de la permission
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
        Schema::dropIfExists('permissions');
    }
}
