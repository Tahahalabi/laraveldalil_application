<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\smallcategoriesModal;
use App\categoriesModal;

use Illuminate\Support\Facades\Validator;

class smallcategoriesController extends Controller
{
    public function index(Request $request)
    {
        $getAllSmallCategories = smallcategoriesModal::select('*', 'smallcategories.smallcategories_id as smallcategoryid')
        ->join('categories', 'categories.categories_id', '=', 'smallcategories.smallcategories_caid')
        ->get();

        $getAllCategories = categoriesModal::select('*')->get();

        return view('admin.panel.pages.smallcategories')->with([
            'userinfo' => $request->session()->get("userinfo"),
            'getAllSmallCategories' => $getAllSmallCategories,
            'getAllCategories' => $getAllCategories
        ]);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'smallcategoryname' => 'required',
            'categoryid' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('/admin/panel/smallcategories')->withErrors($validator)
            ->withInput();
        } else {
            $newSmallCategories = new smallcategoriesModal;
            $newSmallCategories->smallcategories_name = $request->smallcategoryname;
            $newSmallCategories->smallcategories_caid = $request->categoryid;
            $newSmallCategories->save();
    
            return redirect("/admin/panel/smallcategories");
        }
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'smallcategoryid' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('/admin/panel/smallcategories')->withErrors($validator)
            ->withInput();
        } else {
            $deletesmallCategory = smallcategoriesModal::find($request->smallcategoryid);
            $deletesmallCategory->delete();
    
            return redirect("/admin/panel/smallcategories");
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'editsmallcategoriesid' => 'required',
            'smallcategoryname' => 'required',
            'categoryid' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('/admin/panel/smallcategories')->withErrors($validator)
            ->withInput();
        } else {
            $smallCategories = smallcategoriesModal::find($request->editsmallcategoriesid);
            $smallCategories->smallcategories_name = $request->smallcategoryname;
            $smallCategories->smallcategories_caid = $request->categoryid;
            $smallCategories->save();

            return redirect("/admin/panel/smallcategories");
        }
    }
}
