<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use Translatable;

    protected $fillable = [
    	'icon',
    ];

    protected $translatedAttributes = [
    	'title',
    ];

    protected $with = ['translations'];
}
