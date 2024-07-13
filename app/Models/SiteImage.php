<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'site_image',
        'site_tourisitique_fk',
    ];
}
