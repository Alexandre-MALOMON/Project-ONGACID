<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description'
    ];

    public function book(){
        return $this->hasMany(Book::class,'document_id','id');
/*
        $pdf = PDF::loadView('index',$data);
	        return $pdf->download('users_pdf_example.pdf'); */
    }
}
