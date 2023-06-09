<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Don extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'categoryDon_id',
        'lastname',
        'firstname',
        'contact',
        'email',
        'montant',
        'status',
        'transaction_id',
        'payment_method',
        
    ];

    public function don(){
        return $this->belongsTo(CategoryDon::class,'categoryDon_id','id');
    }
}
