<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes';
    protected $fillable = [
        'name',
        'course_id',
        'teacher_id',
        'session_id',
        'room_id',
        'start_date',
        'end_date'
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function income()
    {
        return $this->hasMany(Income::class);
    }

    public function dayOfClass()
    {
        return $this->belongsToMany(DayOfWeek::class, 'day_of_class', 'classes_id', 'day_of_week_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
    public function student()
    {
        return $this->belongsToMany(Student::class, 'student_classes', 'student_id', 'class_id');
    }
}
