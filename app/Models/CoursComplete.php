<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoursComplete extends Model
{
    use HasFactory,SoftDeletes;
    public $fillable = [
        'user_id',
        'cour_id',
        'montant',
        'transaction_id',
        'payment_method',
        'status'
    ];

    public function cours(){
      return  $this->hasMany(Cour::class,'id','cour_id');
    }

    public function user(){
        return  $this->belongsTo(User::class);
      }
}
