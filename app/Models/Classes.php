<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'classes';
    protected $fillable = [
        'name',
        'start_date',
        'end_date'
    ];
    public function course()
    {
        return $this->belongsToMany(Classes::class);
    }

    public function room()
    {
        return $this->belongsToMany(Room::class);
    }

    public function session()
    {
        return $this->belongsToMany(Session::class);
    }

    public function income(){
        return $this->hasMany(Income::class);
    }

    public function dayOfClass()
    {
        return $this->belongsToMany(DayOfWeek::class,'day_of_class','day_of_week_id','classes_id' );
    }

    public function teacher()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
}
