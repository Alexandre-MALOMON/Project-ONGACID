<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory;
    protected $fillable = [
        'recrutement_id',
        'nom',
        'prenom',
        'email',
        'contact',
        'pays',
        'ville',
        'cv'
    ];
}
