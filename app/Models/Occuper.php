<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occuper extends Model
{
    use HasFactory;

    protected $table = 'occupers';

    protected $fillable = [
        'poste_id',
        'employe_id',
        'date_debut',
        'date_fin',
    ];

    // Relation avec le modèle Poste
    public function poste()
    {
        return $this->belongsTo(Poste::class);
    }

    // Relation avec le modèle Employe
    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
