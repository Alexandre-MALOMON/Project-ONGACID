<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activitys extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'lieu',
        'photo',
        'description'
    ];

    public function activiteCat(){
        return $this->belongsTo(Category::class ,'category_id', 'id');
    }
}
