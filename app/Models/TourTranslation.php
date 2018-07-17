<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourTranslation extends Model
{
    protected $fillable = [
    	'title',
    	'sub_title',
    	'description',
    	'price',
    	'price_include',
    	'price_notinclude',
    ];

    public $timestamps = false;
}
