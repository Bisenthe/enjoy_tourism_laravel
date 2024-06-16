<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
            'nom',
            'edition',
            'is_future',
            'status',
            'description',
            'heure_depart',
            'lieu_depart',
            'site_touristique_fk',
            'type_event_fk',
            'event_picture',
            'date_event',
    ];
}
