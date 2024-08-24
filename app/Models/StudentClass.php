<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Student;
use App\Models\Classes;

class StudentClass extends Model
{
    use HasFactory,SoftDeletes;

    protected $table ='student_classes';

    protected $fillable = [
        'student_id',
        'class_id',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
}
