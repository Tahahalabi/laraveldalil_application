<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\categoriesModal;
use Illuminate\Support\Facades\Validator;

use Redirect;

class categories extends Controller
{
    public function index(Request $request)
    {
        $getAllCategories = categoriesModal::select('*')->get();

        return view('admin.panel.pages.categories')->with([
            'userinfo' => $request->session()->get("userinfo"),
            'getAllCategories' => $getAllCategories
        ]);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categoryname' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('/admin/panel/categories')->withErrors($validator)
            ->withInput();
        } else {
            $newCategory = new categoriesModal;
            $newCategory->categories_name = $request->categoryname;
            $newCategory->save();
    
            return redirect("/admin/panel/categories");
        }
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categoryid' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('/admin/panel/categories')->withErrors($validator)
            ->withInput();
        } else {
            $deletecategory = categoriesModal::find($request->categoryid);
            $deletecategory->delete();
    
            return redirect("/admin/panel/categories");
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categoryid' => 'required',
            'categoryname' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('/admin/panel/categories')->withErrors($validator)
            ->withInput();
        } else {
            $updateCategory = categoriesModal::find($request->categoryid);
            $updateCategory->categories_name = $request->categoryname;
            $updateCategory->save();

            return redirect("/admin/panel/categories");
        }
        
    }
}
