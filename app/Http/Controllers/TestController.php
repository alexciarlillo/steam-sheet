<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getTest()
    {
        return $user->toArray();
    }
}
