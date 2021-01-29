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
            $getAllCards = cardsModal::select('*', 'cards.cards_id as cardid', 'categories.categories_id as categoryid', 'categories.categories_name as categoryname')
            ->join('cities', 'cities.cities_id', '=', 'cards.cards_cityid')
            ->join('provinces', 'provinces._provincesid', '=', 'cards.cards_proid')
            ->join('categories', 'categories.categories_id', '=', 'cards.cards_cid')
            ->orderBy('cards.cards_cid', 'desc')
            ->orderBy('cards.cards_id', 'desc')
            ->where('cards.cards_cid', '=', $request->catid)
            ->get();
        } else {
            $getAllCards = cardsModal::select('*', 'cards.cards_id as cardid', 'categories.categories_id as categoryid', 'categories.categories_name as categoryname')
            ->join('cities', 'cities.cities_id', '=', 'cards.cards_cityid')
            ->join('provinces', 'provinces._provincesid', '=', 'cards.cards_proid')
            ->join('categories', 'categories.categories_id', '=', 'cards.cards_cid')
            ->orderBy('cards.cards_cid', 'desc')
            ->orderBy('cards.cards_id', 'desc')
            ->get();
        }

        
        for ($i = 0; $i < count($getAllCards); $i = $i + 1) {

            if ($getAllCards[$i]->smcaid != NULL) {
                $getsmallCategory = smallcategoriesModal::select('*')
                ->where('smallcategories.smallcategories_id', '=', $getAllCards[$i]->smcaid)
                ->first();

                if ($getsmallCategory) {
                    $getAllCards[$i]->smallCategoryname = $getsmallCategory['smc_name'];
                } else {
                    $getAllCards[$i]->smallCategoryname = "";
                }
            }
            

            if ($getAllCards[$i]->smid != NULL) {
                $getsmallCity = smallcitiesModal::select('*')
                ->where('smallcities.smallcities_id', '=', $getAllCards[$i]->smid)
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

        $getAllCities = citiesModal::select('*')->orderBy('cities.cities_ordernum', 'asc')->get();

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
        
        $newCard->cards_smcaid = $request->smallcategoryid;
        $newCard->cards_smid = $request->smallcityid;
        $newCard->cards_cityid = $request->cityid;
        $newCard->cards_proid = $request->provinceid;
        $newCard->cards_cid = $request->categoryid;
        $newCard->cards_title = $request->title;
        $newCard->cards_description = $request->description;
        $newCard->cards_location = $request->location;
        $newCard->cards_phone1 = $request->phone1;
        $newCard->cards_phone2 = $request->phone2;
        $newCard->cards_phone3 = $request->phone3;
        $newCard->cards_link = $request->link;
        $newCard->cards_facebook = $request->facebook;
        $newCard->cards_gmail = $request->gmail;
        $newCard->cards_instagram = $request->instagram;
        $newCard->cards_twitter = $request->twitter;
        $newCard->cards_youtube = $request->youtube;
        $newCard->cards_topleftword = $request->topleftword;
        $newCard->cards_bottomrightword = $request->bottomrightword;
        $newCard->cards_map = $request->map;


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

            $newCard->cards_photo = '/storage/uploads/' . $fileNameToStore;

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
