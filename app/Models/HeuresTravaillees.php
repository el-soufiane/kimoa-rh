<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeuresTravaillees extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_id',
        'mois',
        'heures_retard',
    ];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
