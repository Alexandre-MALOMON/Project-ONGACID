<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formation extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'photo',
        'debut',
        'fin',
        'lieu',
        'lien',
        'heure',
        'type',
        'prix',
        'status',
        'description'
    ];
}
