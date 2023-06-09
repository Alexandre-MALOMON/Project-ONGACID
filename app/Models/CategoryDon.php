<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryDon extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'description'
    ];

    public function donates(){
       return $this->hasMany(Don::class,'categoryDon_id','id');
    }
}
