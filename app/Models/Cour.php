<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cour extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'courCategory_id',
        'title_cours',
        'photo',
        'slug',
        'type',
        'prix',
        'heure',
        'description_cours'
    ];

    public function episodes()
    {
        return $this->hasMany(Episode::class, 'cour_id');
    }

    public function category(){
        return $this->belongsTo(CourCategory::class,'courCategory_id','id');
    }

    public function completeds(){
        return $this->hasMany(Completion::class,'episode_id');
    }
}
