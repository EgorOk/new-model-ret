<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\ModelBrands;
use App\Models\Models;
use App\Models\UpdateControll;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;

class DownloadController extends Controller
{
    public function modelList()
    {
        $brands = Brands::get();

        return view("downloadModel", ['brands' => $brands]);
    }

    public function downloadCSV(Request $request)
    {
        // dd($request->file('formFile')->getMimeType(), $request->file('formFile')->getClientOriginalExtension());
        $validated = $request->validate([
            'formFile' => 'required|mimes:csv,txt',
            'brandId' => 'required',
        ]);

        $originalFile = $request->file('formFile');
        $userId = auth()->id();

        // Добавление в бд парса
        $import = UpdateControll::create([
            'name' => $originalFile->getClientOriginalName(),
            'create_user_id' => $userId,
        ]);

        $addres = $request->file('formFile')->storeAs(
            $import->id, $originalFile->getClientOriginalName()
        );

        $pars = LazyCollection::make(function () use ($originalFile) {
            $file = fopen($originalFile, 'r');
            while ($data = fgetcsv($file)) {
                $data = mb_convert_encoding($data[0], 'UTF-8', mb_detect_encoding($data[0], ['cp1251', 'UTF-8']));

                // $data = mb_convert_encoding($data, "WINDOWS-1251");
                $rezult = explode(";", $data);
                yield $rezult;
            }
        });

        $mark = $firstTenNumbers = $pars->take(1)->collect();
        $rezultPars = $firstTenNumbers = $pars->skip(1)->collect();

        $modelKey = array_search("model", $mark[0]);
        $brands = Brands::get();
        $errorsModels = [];
        $createModels = [];

        //проверки дублей и создание массива ошибок
        foreach ($rezultPars as $key => $modelPars) {
            $model = $modelPars[$modelKey];
            $modelDuo = Models::where('name', $model)->first();
            if ($modelDuo) {
                array_push($errorsModels, ['model' => $model, 'id' => $modelDuo->id]);
            } else {
                $models = Models::create([
                    'create_user_id' => $userId,
                    'update_user_id' => $userId,
                    'update_controll_id' => $import->id,
                    'name' => $model,
                    'active' => true,
                ]);

                ModelBrands::create([
                    'model_id' => $models->id,
                    'brand_id' => $request->brandId,
                ]);

                array_push($createModels, ['model' => $model]);
            }
        }

        return view("downloadModel", ['models' => ['brands' => $brands, 'errorsModels' => $errorsModels, 'createModels' => $createModels]]);
    }
}
