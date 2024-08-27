<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class Student extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'students';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'birth_day',
        'address',
        'enrollment_date',
        'image'
    ];

    public function income()
    {
        return $this->hasMany(Income::class);
    }

    public function classes(){
        return $this->belongsToMany(Classes::class, 'student_classes', 'student_id', 'class_id');
    }

}
