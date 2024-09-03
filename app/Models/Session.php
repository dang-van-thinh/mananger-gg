<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $table = 'sessions';
    protected $fillable = [
        'name',
        'start_time',
        'end_time'
    ];

    public function classes(){
        return $this->hasMany(Classes::class);
    }
    public $timestamps = false;
}
