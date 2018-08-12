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
    	'slug',
    	'description',
    ];

    protected $with = ['translations'];

    public function services()
    {
    	return $this->hasMany(HotelService::class);
    }

    public function getMediaImgAttribute()
    {
    	return $this->getFirstMedia('cover');
    }

    public function hotel_services()
    {
        return $this->belongsToMany(HotelService::class);
    }
}
