<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelTranslation extends Model
{	
	protected $translatable = false;

    protected $fillable = [
    	'name',
    	'title',
    	'description',
    ];
}
