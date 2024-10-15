<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
    ];

    public function employes()
    {
        return $this->hasMany(Occuper::class, 'poste_id');
    }
}
