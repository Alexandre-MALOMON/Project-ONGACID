<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Benevole extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'firstname',
        'lastname',
        'photo',
        'email',
        'contact',
        'pays',
        'localisation',
        'status'
    ];
}
