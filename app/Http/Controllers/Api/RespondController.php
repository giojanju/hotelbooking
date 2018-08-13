<?php

namespace App\Http\Controllers\Api;

use App\CRUD\CrudAbstract;
use App\Http\Controllers\Controller;
use App\Models\Respond;
use Illuminate\Http\Request;

class RespondController extends CrudAbstract
{
    protected $config = [
        'model' => [
            'name' => Respond::class,
            'rules' => [
                'email' => 'required',
                'address' => 'required',
            ],
        ],
    ];
}
