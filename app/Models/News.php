<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'user_id',
        'category_actualite_id',
        'title',
        'slug',
        'photo',
        'description'
    ];

    public function pub(){
        return $this->belongsTo(CategoryActualite::class,'category_actualite_id','id');
    }
}
