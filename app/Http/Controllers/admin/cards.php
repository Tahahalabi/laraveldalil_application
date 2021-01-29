<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\provincesModal;
use App\citiesModal;
use App\smallcitiesModal;
use App\cardsModal;
use App\categoriesModal;
use App\smallcategoriesModal;

use Illuminate\Support\Facades\Validator;

use Redirect;

class cards extends Controller
{
    public function index(Request $request)
    {

        $getAllCards;

        if ($request->api == "true" && $request->catid != "") {
            $getAllCards = cardsModal::select('*', 'cards.id as cardid', 'categories.id as categoryid', 'categories.name as categoryname')
            ->join('cities', 'cities.id', '=', 'cards.cityid')
            ->join('provinces', 'provinces.id', '=', 'cards.proid')
            ->join('categories', 'categories.id', '=', 'cards.cid')
            ->orderBy('cards.cid', 'desc')
            ->orderBy('cards.id', 'desc')
            ->where('cards.cid', '=', $request->catid)
            ->get();
        } else {
            $getAllCards = cardsModal::select('*', 'cards.id as cardid', 'categories.id as categoryid', 'categories.name as categoryname')
            ->join('cities', 'cities.id', '=', 'cards.cityid')
            ->join('provinces', 'provinces.id', '=', 'cards.proid')
            ->join('categories', 'categories.id', '=', 'cards.cid')
            ->orderBy('cards.cid', 'desc')
            ->orderBy('cards.id', 'desc')
            ->get();
        }

        
        for ($i = 0; $i < count($getAllCards); $i = $i + 1) {

            if ($getAllCards[$i]->smcaid != NULL) {
                $getsmallCategory = smallcategoriesModal::select('*')
                ->where('smallcategories.id', '=', $getAllCards[$i]->smcaid)
                ->first();

                if ($getsmallCategory) {
                    $getAllCards[$i]->smallCategoryname = $getsmallCategory['smc_name'];
                } else {
                    $getAllCards[$i]->smallCategoryname = "";
                }
            }
            

            if ($getAllCards[$i]->smid != NULL) {
                $getsmallCity = smallcitiesModal::select('*')
                ->where('smallcities.id', '=', $getAllCards[$i]->smid)
                ->first();

                if ($getsmallCity) {
                    $getAllCards[$i]->sm_name = $getsmallCity['sm_name'];
                } else {
                    $getAllCards[$i]->sm_name = "";
                }
            }
            
        }
        
        if ($request->api == "true") {
            return view('admin.panel.pages.includes.getcards')->with([
                'getAllCards' => $getAllCards
            ]);   
        }
        

        $getAllProvinces = provincesModal::select('*')->get();

        $getAllCategoreis = categoriesModal::select('*')->get();

        $getAllCities = citiesModal::select('*')->orderBy('cities.ordernum', 'asc')->get();

        $getsmallCategories = smallcategoriesModal::select('*')->get();

        return view('admin.panel.pages.cards')->with([
            'userinfo' => $request->session()->get("userinfo"),
            'getAllCards' => $getAllCards,
            'getAllProvinces' => $getAllProvinces,
            'getAllCategoreis' => $getAllCategoreis,
            'getsmallCategories' => $getsmallCategories,
            'getAllCities' => $getAllCities
        ]);
    }

    public function addedit(Request $request)
    {
        $newCard;
        if ($request->type == "add") {
            $newCard = new cardsModal;
        } else if ($request->type == "edit") {
            $newCard = cardsModal::find($request->editcardid);
        }
        
        if ($request->showfirst == "") {
            $newCard->showfirst = 1000;
        } else {
            $newCard->showfirst = $request->showfirst;
        }
        
        $newCard->smcaid = $request->smallcategoryid;
        $newCard->smid = $request->smallcityid;
        $newCard->cityid = $request->cityid;
        $newCard->proid = $request->provinceid;
        $newCard->cid = $request->categoryid;
        $newCard->title = $request->title;
        $newCard->description = $request->description;
        $newCard->location = $request->location;
        $newCard->phone1 = $request->phone1;
        $newCard->phone2 = $request->phone2;
        $newCard->phone3 = $request->phone3;
        $newCard->link = $request->link;
        $newCard->facebook = $request->facebook;
        $newCard->gmail = $request->gmail;
        $newCard->instagram = $request->instagram;
        $newCard->twitter = $request->twitter;
        $newCard->youtube = $request->youtube;
        $newCard->topleftword = $request->topleftword;
        $newCard->bottomrightword = $request->bottomrightword;
        $newCard->map = $request->map;


        if ($request->hasFile('photo')) {
            // Get filename with the extension
            $filenameWithExt = $request->photo->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->photo->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->photo->storeAs('public/uploads', $fileNameToStore);

            $newCard->photo = '/storage/uploads/' . $fileNameToStore;

            //$newabout->photo = '/storage/app/public/uploads/' . $fileNameToStore;


        }

        $newCard->save();


        

        return redirect("/admin/panel/cards");
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cardid' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('/admin/panel/cards')->withErrors($validator)
            ->withInput();
        } else {
            $deletecard = cardsModal::find($request->cardid);
            $deletecard->delete();
    
            return redirect("/admin/panel/cards");
        }
    }
}
