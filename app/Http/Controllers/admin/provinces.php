<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\provincesModal;

use Illuminate\Support\Facades\Validator;

use Redirect;

class provinces extends Controller
{
    public function index(Request $request)
    {
        $getAllProvinces = provincesModal::select('*')->get();

        return view('admin.panel.pages.provinces')->with([
            'userinfo' => $request->session()->get("userinfo"),
            'getAllProvinces' => $getAllProvinces
        ]);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'provincename' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('/admin/panel/provinces')->withErrors($validator)
            ->withInput();
        } else {
            $newCategory = new provincesModal;
            $newCategory->province_name = $request->provincename;
            $newCategory->save();
    
            return redirect("/admin/panel/provinces");
        }
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'provinceid' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('/admin/panel/provinces')->withErrors($validator)
            ->withInput();
        } else {
            $deletecategory = provincesModal::find($request->provinceid);
            $deletecategory->delete();
    
            return redirect("/admin/panel/provinces");
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'provinceid' => 'required',
            'provincename' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('/admin/panel/provinces')->withErrors($validator)
            ->withInput();
        } else {
            $updateCategory = provincesModal::find($request->provinceid);
            $updateCategory->province_name = $request->provincename;
            $updateCategory->save();

            return redirect("/admin/panel/provinces");
        }
    }
}
