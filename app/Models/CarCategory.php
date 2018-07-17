<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class CarCategory extends Model implements HasMedia
{
    use Translatable, HasMediaTrait;

    protected $fillable = [
    	'',
    ];

    public $translatedAttributes = [
    	'title',
    ];

    public function cars()
    {
    	return $this->belongsTo(Car::class);
    }
}
