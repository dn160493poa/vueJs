<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonsController extends Controller
{
    public function __invoke()
    {
        return [
            [
                'id' => 1,
                'name' => 'Vasya',
                'job' => 'prostitut',
                'age' => '44'
            ],
            [
                'id' => 2,
                'name' => 'Petya',
                'job' => 'barmen',
                'age' => '34'
            ],
            [
                'id' => 3,
                'name' => 'Grisha',
                'job' => 'santehnik',
                'age' => '54'
            ]
        ];
    }
}
