<?php

namespace App\Http\Controllers;

use App\Models\Models;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function home()
    {
        $models = Models::get();

        return view('models', ['models' => $models]);
    }
}
