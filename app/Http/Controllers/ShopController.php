<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\ShopBrends;
use App\Models\Shops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    public function shops()
    {

        $shops = Shops::get();
        return view('shops', ['shops' => $shops]);
    }
    public function createShop()
    {
        $brands = Brands::get();

        return view('createShop', ['brands' => $brands]);
    }
    public function shop($id)
    {
        $shop = Shops::query()->select(['id', 'name', 'url'])->with(['brands'])->where('id', $id)->first();

        return view('shop', ['shop' => $shop]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:shops,name',
            'url' => 'required',
            'brandId' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/create-shop')
                ->withErrors($validator)
                ->withInput();
        }
        $userId = auth()->id();

        $shop = Shops::create([
            'create_user_id' => $userId,
            'update_user_id' => $userId,
            'name' => $request->name,
            'url' => $request->url,
        ]);

        foreach ($request->brandId as $brand_id) {
            ShopBrends::create([
                'shop_id' => $shop->id,
                'brand_id' => $brand_id
            ]);
        }

        $brands = Brands::get();
        return view('createShop', ['brands' => $brands, 'shop' => $shop]);
    }
}
