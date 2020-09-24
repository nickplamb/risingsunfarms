<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chicken extends Model
{
    use HasFactory;

    protected $dates = [
    	'DOD',
    	'DOB'
    ];

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function getAgeAttribute()
    {
    	return $this->DOB->diffInWeeks();
    }

    public function getImageAttribute()
    {
       return $this->photo_url;
    }
}
