<?php

namespace App\Http\Controllers;

use App\Imports\ProductImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UserImport;

class UploadController extends Controller
{
    public function index() {
        return view('form.bulkUpload');
    }

    public function store(Request $request) {
        // dd($model);
        // Excel::import(new UserImport, $request->file('uploadedFile'));
        Excel::import(new ProductImport, $request->file('uploadedFile'));

        dd('uploaded users in your database successfully!');

    }
}
