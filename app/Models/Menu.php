<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use Translatable;

    protected $fillable = [
    	'parent_id',
    ];
    
    public $translatedAttributes = [
    	'name',
        'slug',
    ];

    public function parents()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function parent()
    {
    	return $this->belongsTo(self::class, 'parent_id');
    }

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
}
