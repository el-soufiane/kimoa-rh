<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeContrat extends Model
{
    use HasFactory;

    protected $fillable = ['libellé'];

    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }
}

