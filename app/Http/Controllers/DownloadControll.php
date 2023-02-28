<?php

namespace App\Http\Controllers;

use App\Models\UpdateControll;
use Illuminate\Http\Request;

class DownloadControll extends Controller
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
        $import = UpdateControll::create([
            'name' => $originalFile->getClientOriginalName(),
            'create_user_id' => auth()->id(),
        ]);

        $addres = $request->file('formFile')->storeAs(
            $import->id, $originalFile->getClientOriginalName()
        );
        return view("download");
    }
}