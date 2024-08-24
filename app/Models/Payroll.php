<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'total_hours',
        'total_salary',
        'pay_date_start',
        'pay_date_end',
    ];
    public function teacher(){
        return $this->belongsToMany(Teacher::class);
    }
}
