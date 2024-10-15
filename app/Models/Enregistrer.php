<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enregistrer extends Model
{
    use HasFactory;

    protected $fillable = [
        'presence_id',
        'employe_id',
        'heure_arrivee',
        'heure_depart',
        'date',
    ];

    // Relations
    public function presence()
    {
        return $this->belongsTo(Presence::class);
    }

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
