<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkoutController extends Controller
{
   
    function index()  {
        return view('gym.index');
    }
}
