<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brands()
    {
        $brands = Brands::get();

        return view('brands', ['brands' => $brands]);
    }
    public function brand($id)
    {
        $brand = Brands::query()->select(['id', 'name'])->with(['models'])->where('id', $id)->first();

        return view('brand', ['brand' => $brand]);
    }

    public function createBrand()
    {
        return view('createBrand');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:brands,name',
        ]);

        $userId = auth()->id();

        $brand = Brands::create([
            'create_user_id' => $userId,
            'update_user_id' => $userId,
            'name' => $request->name,
        ]);

        return view('createBrand', ['brand' => $brand]);
    }

}
