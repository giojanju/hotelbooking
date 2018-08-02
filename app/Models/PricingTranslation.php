<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingTranslation extends Model
{
	public $timestamps = false;
	
    protected $fillable = [
    	'title',
    	'description',
    ];
}
