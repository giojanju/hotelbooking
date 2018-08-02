<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use Translatable;

    protected $fillable = [
    	'price',
    ];

    public $translatedAttributes = [
    	'title',
    	'description',
    ];

    protected $with = ['translations'];
}
