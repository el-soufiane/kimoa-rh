<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    protected $fillable = ['libelle'];

    // Relation avec la table Enregistrer
    public function enregistrers()
    {
        // return $this->hasMany(Enregistrer::class);
    }
}
