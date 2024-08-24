<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DayOfWeek extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'day_of_weeks';
    protected $fillable = [
        'name',
        'description',
    ];

    public function classes()
    {
        return $this->belongsToMany(DayOfWeek::class,'day_of_class','day_of_week_id','classes_id' );
    }
}
