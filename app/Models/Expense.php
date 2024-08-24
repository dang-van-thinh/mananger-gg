<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'title',
        'description',
        'date',
        'paid_to',
        'payment_method',
        'note',
    ];
}
