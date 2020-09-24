<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egg extends Model
{
    use HasFactory;

    protected $guarded = [];
    //protected $fillable = ['chicken_name', 'weight', 'layed_on', 'comments'];
/*
    public functions getEggsTodayAttribute()
    {
    	return Carbon\Carbon::now()->toDateTimeString();
    }*/
}
