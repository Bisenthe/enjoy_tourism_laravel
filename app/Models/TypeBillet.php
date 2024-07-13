<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeBillet extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'montant',
        'nombre_personne',
        'avantage_fk',
    ];
}
