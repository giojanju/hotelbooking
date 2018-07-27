<?php

namespace App\Http\Controllers\Api;

use App\CRUD\CrudAbstract;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends CrudAbstract
{
    protected $config = [
    	'model' => [
    		'name' => Service::class,
    		'rules' => [
    			'ge.title' => 'required',
    		]
    	],
    ];
}
