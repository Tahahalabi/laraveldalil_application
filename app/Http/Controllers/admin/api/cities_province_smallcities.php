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
        $getCities = citiesModal::select('*', 'cities.cities_id as cityid')
        ->join('provinces', 'provinces.provinces_id', '=', 'cities.cities_pid')
        ->where('provinces.provinces_id', '=', $request->provinceid)
        ->get();


        return $getCities;
    }

    public function getsmallcitiesforcity(Request $request)
    {
        $getsmallCities = smallcitiesModal::select('*', 'smallcities.id as smallcityid')
        ->join('cities', 'cities.cities_id', '=', 'smallcities.smallcities_cid')
        ->where('cities.cities_id', '=', $request->cityid)
        ->get();


        return $getsmallCities;
    }

    public function getsmallcategoriesforcategory(Request $request)
    {
        $getsmallcategories = smallcategoriesModal::select('*', 'smallcategories.smallcategories_id as smallcategoriesid')
        ->join('categories', 'categories.categories_id', '=', 'smallcategories.smallcategories_caid')
        ->where('categories.categories_id', '=', $request->caid)
        ->get();


        return $getsmallcategories;
    }
}
