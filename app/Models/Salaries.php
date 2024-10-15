<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salaries extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_id',
        'heures_normales',
        'heures_travaillees',
        'prime',
        'taux_horaire',
        'total_a_payer'
    ];
 
    // Relation avec le modèle Employe
    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }


}

