<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoriesModal;
use App\provincesModal;


class homeController extends Controller
{
    public function index(Request $request)
    {
        $getAllCategoreis = categoriesModal::select('*')->get();
        $defaultProvince = provincesModal::select('*')->first();

        return view('home')->with([
            'getAllCategoreis' => $getAllCategoreis,
            'defaultProvince' => $defaultProvince
        ]);
    }
}
