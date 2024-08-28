<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
       'name',
        'image',
        'email',
        'phone',
        'degree',
        'address',
        'birth_day',
        'qualification',
        'hourly_rate',
    ];
    public function payroll(){
        return $this->hasMany(Payroll::class);
    }

    public function classes(){
        return $this->hasMany(Classes::class);
    }
}