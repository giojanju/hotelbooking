<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Tour extends Model implements HasMedia
{
    use Translatable, HasMediaTrait;

    protected $fillable = [
    	'menu_id',
    ];

    public $translatedAttributes = [
    	'title',
        'slug',
    	'sub_title',
    	'description',
    	'price',
    	'price_include',
    	'price_notinclude',
    ];

    public function days()
    {
    	return $this->hasMany(Day::class);
    }

    public function menu()
    {
    	return $this->belongsTo(Menu::class);
    }
}
