<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DayTranslation extends Model
{
    protected $fillable = [
		'title',
    	'text',
	];

    public $timestamps = false;
}
