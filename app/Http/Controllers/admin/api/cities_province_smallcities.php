<?php

namespace App\Http\Controllers\admin\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\provincesModal;
use App\citiesModal;
use App\smallcitiesModal;
use App\categoriesModal;
use App\smallcategoriesModal;

use Illuminate\Support\Facades\Validator;

use Redirect;

class cities_province_smallcities extends Controller
{
    // getcitiesforprovince
    public function getcitiesforprovince(Request $request)
    {
        $getCities = citiesModal::select('*', 'cities.id as cityid')
        ->join('provinces', 'provinces.id', '=', 'cities.pid')
        ->where('provinces.id', '=', $request->provinceid)
        ->get();


        return $getCities;
    }

    public function getsmallcitiesforcity(Request $request)
    {
        $getsmallCities = smallcitiesModal::select('*', 'smallcities.id as smallcityid')
        ->join('cities', 'cities.id', '=', 'smallcities.cid')
        ->where('cities.id', '=', $request->cityid)
        ->get();


        return $getsmallCities;
    }

    public function getsmallcategoriesforcategory(Request $request)
    {
        $getsmallcategories = smallcategoriesModal::select('*', 'smallcategories.id as smallcategoriesid')
        ->join('categories', 'categories.id', '=', 'smallcategories.caid')
        ->where('categories.id', '=', $request->caid)
        ->get();


        return $getsmallcategories;
    }
}
