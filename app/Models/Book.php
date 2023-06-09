<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'document_id',
        'title',
        'slug',
        'photo',
        'livre',
        'auteur',
        'description',
        'type',
        'prix',
        'lien',
        'telechargement'
    ];

    public function bookcategory(){
        return $this->belongsTo(Document::class,'document_id','id');
    }

    public function booktype(){
        return $this->belongsTo(Document::class,'documents_id','id');
    }
}
