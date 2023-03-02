<?php

namespace App\Http\Controllers;

use App\Models\Models;
use App\Models\UpdateControll;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;

class DownloadController extends Controller
{
    public function home()
    {
        return view("download");
    }

    public function downloadCSV(Request $request)
    {
        // dd($request->file('formFile')->getMimeType(), $request->file('formFile')->getClientOriginalExtension());
        $validated = $request->validate([
            'formFile' => 'required|mimes:csv,txt',
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
        $errorsModels = [];
        $createModels = [];

        foreach ($rezultPars as $key => $modelPars) {
            // echo $key . " " . $model . "<br>";
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
                array_push($createModels, ['model' => $model]);
            }
        }
        return view("download", ['code' => 201, 'errorsModels' => $errorsModels, 'createModels' => $createModels]);
    }
}