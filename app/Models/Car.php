<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Car extends Model implements HasMedia
{
    use Translatable, HasMediaTrait;

    protected $fillable = [
    	'price',
    	'car_category_id',
    ];

    public $translatedAttributes = [
    	'title',
    	'description',
    ];

    public function carCategory()
    {
    	return $this->belongsTo(CarCategory::class);
    }
}
