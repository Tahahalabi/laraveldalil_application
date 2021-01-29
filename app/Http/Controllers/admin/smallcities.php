<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\provincesModal;
use App\citiesModal;
use App\smallcitiesModal;

use Illuminate\Support\Facades\Validator;

use Redirect;

class smallcities extends Controller
{
    public function index(Request $request)
    {
        $getAllSmallCities = smallcitiesModal::select('*', 'smallcities.id as smallcityid')
        ->join('cities', 'cities.id', '=', 'smallcities.cid')
        ->get();

        $getAllCities = citiesModal::select('*')->get();

        return view('admin.panel.pages.smallcities')->with([
            'userinfo' => $request->session()->get("userinfo"),
            'getAllSmallCities' => $getAllSmallCities,
            'getAllCities' => $getAllCities
        ]);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cityname' => 'required',
            'cityid' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('/admin/panel/smallcities')->withErrors($validator)
            ->withInput();
        } else {
            $newCity = new smallcitiesModal;
            $newCity->sm_name = $request->cityname;
            $newCity->cid = $request->cityid;
            $newCity->save();
    
            return redirect("/admin/panel/smallcities");
        }
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cityid' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('/admin/panel/smallcities')->withErrors($validator)
            ->withInput();
        } else {
            $deletecity = smallcitiesModal::find($request->cityid);
            $deletecity->delete();
    
            return redirect("/admin/panel/smallcities");
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'editsmallcityid' => 'required',
            'editsmallcityname' => 'required',
            'editcityid' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('/admin/panel/smallcities')->withErrors($validator)
            ->withInput();
        } else {
            $updateCity = smallcitiesModal::find($request->editsmallcityid);
            $updateCity->sm_name = $request->editsmallcityname;
            $updateCity->cid = $request->editcityid;
            $updateCity->save();

            return redirect("/admin/panel/smallcities");
        }
    }
}
