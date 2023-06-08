<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InscriptionForm extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'formation_id',
        'lastname',
        'firstname',
        'institution',
        'email',
        'contact',
        'statut'
    ];
}
