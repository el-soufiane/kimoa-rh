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
        'departement_id', // Ajout de ce champ
    ];

    public static function generateMatricule()
    {
        $lastEmploye = self::orderBy('id', 'desc')->first();
        $nextId = $lastEmploye ? $lastEmploye->id + 1 : 1;

        return 'EMP-' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
    }

    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }

    public function postes()
    {
        return $this->hasMany(Occuper::class, 'employe_id');
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class); // Relation avec le département
    }
}
