<?php

namespace App\Http\Controllers;

use App\Models\Models;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function home()
    {
        $models = Models::all();

        return view('models', ['models' => $models]);
    }
}
