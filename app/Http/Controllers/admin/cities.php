<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\provincesModal;
use App\citiesModal;

use Illuminate\Support\Facades\Validator;

use Redirect;


class cities extends Controller
{
    public function index(Request $request)
    {
        $getAllCities = citiesModal::select('*', 'cities.id as cityid')
        ->join('provinces', 'provinces.id', '=', 'cities.pid')
        ->get();

        $getAllProvinces = provincesModal::select('*')->get();

        return view('admin.panel.pages.cities')->with([
            'userinfo' => $request->session()->get("userinfo"),
            'getAllCities' => $getAllCities,
            'getAllProvinces' => $getAllProvinces
        ]);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cityname' => 'required',
            'provinceid' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('/admin/panel/cities')->withErrors($validator)
            ->withInput();
        } else {
            $newCity = new citiesModal;
            $newCity->c_name = $request->cityname;
            $newCity->pid = $request->provinceid;
            if ($request->cityorder == "") {
                $request->cityorder = 1000;
            }
            $newCity->ordernum = $request->cityorder;
            $newCity->save();
    
            return redirect("/admin/panel/cities");
        }
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cityid' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('/admin/panel/cities')->withErrors($validator)
            ->withInput();
        } else {
            $deletecity = citiesModal::find($request->cityid);
            $deletecity->delete();
    
            return redirect("/admin/panel/cities");
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'editcityid' => 'required',
            'cityname' => 'required',
            'provinceid' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('/admin/panel/cities')->withErrors($validator)
            ->withInput();
        } else {
            $updateCity = citiesModal::find($request->editcityid);
            $updateCity->c_name = $request->cityname;
            $updateCity->pid = $request->provinceid;
            if ($request->cityorder == "") {
                $request->cityorder = 1000;
            }
            $updateCity->ordernum = $request->cityorder;
            $updateCity->save();

            return redirect("/admin/panel/cities");
        }
    }
}
