<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UserImport;

class UploadController extends Controller
{
    public function index() {
        return view('form.bulkUpload');
    }

    public function store(Request $request) {
        Excel::import(new UserImport, $request->file('uploadedFile'));

        dd('done');

    }
}
