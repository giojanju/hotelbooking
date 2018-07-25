<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Hotel extends Model implements HasMedia
{
    use Translatable, HasMediaTrait;

    protected $fillable = [
    	'price',
    ];

    public $translatedAttributes = [
    	'name',
    	'title',
    ];

    protected $with = ['translations'];
}
