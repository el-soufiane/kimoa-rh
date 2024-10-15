<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'date_naissance',
        'lieu_naissance',
        'sexe',
        'situation_matrimoniale',
        'adresse',
        'bp',
        'telephone',
        'qualification',
    ];

    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }

    // Aucune relation avec Poste
}
