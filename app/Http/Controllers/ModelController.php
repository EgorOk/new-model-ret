<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\ModelBrands;
use App\Models\Models;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function home()
    {
        $name = 'name';

        $models = Models::all();

        // $models = Models::orderBy(
        //     Brands::select("$name")->join('model_brands', 'model_brands.brand_id', '=', 'brands.id')
        //         ->whereColumn('model_brands.model_id', 'models.id')
        //         ->latest('brands.created_at')
        //         ->take(1)
        // )->get();

        return view('models', ['models' => $models]);
    }
}
