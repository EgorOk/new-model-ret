<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrendController extends Controller
{
    public function home()
    {
        return view("brend");
    }
}