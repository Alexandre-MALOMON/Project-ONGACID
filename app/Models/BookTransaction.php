<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'book_id',
        'montant',
        'status',
        'transaction_id',
        'payment_method',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
