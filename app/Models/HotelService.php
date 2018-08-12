<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class HotelService extends Model
{
	use Translatable;

    protected $fillable = [
    	'hotel_id',
    ];

    public $translatedAttributes = [
    	'title',
    ];

    protected $with = ['translations'];

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class);
    }
}
