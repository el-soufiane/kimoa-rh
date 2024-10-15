<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_id',
        'type_contrat_id',
        'date_debut',
        'date_fin',
        'fichier',
        'taux_horaire',
        'observation',
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }

    public function typeContrat()
    {
        return $this->belongsTo(TypeContrat::class);
    }
}
