<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use Translatable;

    protected $fillable = [
    	'tour_id',
    ];
    
    public $translatedAttributes = [
    	'title',
    	'text',
    ];

    public function tour()
    {
    	return $this->belongsTo(Tour::class);
    }
}
