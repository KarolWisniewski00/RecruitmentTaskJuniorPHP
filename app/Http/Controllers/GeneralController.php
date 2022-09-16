<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    /*MAIN VIEW*/
    public function welcome(){
        return view('welcome');
    }
}
