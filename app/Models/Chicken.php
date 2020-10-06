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
    	return $this->DOB->diffInWeeks() . " weeks old";
    }

    public function getImageAttribute()
    {
       return $this->photo_url;
    }

    public function getDiedAttribute()
    {
        return $this->DOD->format('D, M jS Y');
    }

    public function getBornAttribute()
    {
        return $this->DOB->format('D, M jS Y');
    }
    public function getDOBHumanAttribute()
    {
        return isset($this->DOB) ? $this->DOB->format('m-d-Y') : '';
    }
    public function getDODHumanAttribute()
    {
        return isset($this->DOD) ? $this->DOD->format('m-d-Y') : '';
    }
    public function getDOBInputDateAttribute()
    {
        return isset($this->DOB) ? $this->DOB->format('Y-m-d') : '';
    }
    public function getDODInputDateAttribute()
    {
        return isset($this->DOD) ? $this->DOD->format('Y-m-d') : '';
    }
}
