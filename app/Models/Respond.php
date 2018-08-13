<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respond extends Model
{
	protected $table = 'responde';

    protected $fillable = [
    	'email',
    	'address',
    	'rooms',
    ];
}
