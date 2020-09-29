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
}
