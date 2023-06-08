<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recrutement extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'start',
        'end',
        'num',
        'year',
        'type',
        'status',
        'recrutement_link',
        'description',
        'lettre',
        'cv',
        'diplome'
     ];

     public function candidatures(){
        return $this->hasMany(Candidature::class);
     }
}
