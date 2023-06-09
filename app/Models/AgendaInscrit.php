<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaInscrit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'contact',
        'formation_id',
        'montant',
        'transaction_id',
        'payment_method',
        'status'
    ];
}
