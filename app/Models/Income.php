<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'amount',
        'title',
        'description',
        'date',
        'received_from',
        'payment_method',
        'note'
    ];

    public function student(){
        return $this->belongsToMany(Student::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classes::class);
    }
}
