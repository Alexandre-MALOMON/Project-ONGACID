<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Episode extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'cour_id',
        'title',
        'slug',
        'video',
        'description',
    ];
}
