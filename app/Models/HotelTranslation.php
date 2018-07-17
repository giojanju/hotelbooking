<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelTranslation extends Model
{
    protected $fillable = [
    	'title',
    	'slug',
    	'text',
    ];

    public $timestamps = false;
}
