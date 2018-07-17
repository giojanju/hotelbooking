<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Setting extends Model implements HasMedia
{
	use Translatable, HasMediaTrait;

    protected $fillable = [
    	'key',
    	'value',
    ];

    protected $with = ['translations'];

    public $translatedAttributes = ['locale_value'];
}
