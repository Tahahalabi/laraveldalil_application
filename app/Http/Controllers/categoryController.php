<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\advertisementModel;
use App\categoriesModal;
use App\provincesModal;
use App\citiesModal;
use App\smallcitiesModal;
use App\cardsModal;

use App\smallcategoriesModal;

class categoryController extends Controller
{
    public function index(Request $request)
    {
        //return $request->pid;

        $getAdvertisement = advertisementModel::select('*')->first();

        $getCities = citiesModal::select('*')
        ->where('cities.pid', '=', $request->pid)
        ->orderBy('cities.ordernum', 'asc')
        ->get();

        $getSmallCategories = smallCategoriesModal::select('*')
        ->where('smallcategories.caid', '=', $request->cid)
        ->get();

        $getCards;

        if ($request->cityid != "" && $request->smid == "" && $request->smallcategory != "" ) {
            $getCards = cardsModal::select('*', 'cards.id as cardid', 'categories.id as categoryid')
            ->join('categories', 'categories.id', '=', 'cards.cid')
            ->where('categories.id', '=', $request->cid)
            ->where('cards.cityid', '=', $request->cityid)
            ->where('cards.smcaid', '=', $request->smallcategory)
            ->orderBy('cards.showfirst', 'asc')
            ->paginate(20);
        } else if ($request->cityid == "" && $request->smid == "" && $request->smallcategory != "") {
            $getCards = cardsModal::select('cards.*')
            ->join('categories', 'categories.id', '=', 'cards.cid')
            ->where('categories.id', '=', $request->cid)
            ->where('cards.smcaid', '=', $request->smallcategory)
            ->orderBy('cards.showfirst', 'asc')
            ->paginate(20);
        } else if ($request->cityid != "" && $request->smid != "" && $request->smallcategory != "" ) {
            $getCards = cardsModal::select('*', 'cards.id as cardid', 'categories.id as categoryid')
            ->join('categories', 'categories.id', '=', 'cards.cid')
            ->where('categories.id', '=', $request->cid)
            ->where('cards.smid', '=', $request->smid)
            ->where('cards.cityid', '=', $request->cityid)
            ->where('cards.smcaid', '=', $request->smallcategory)
            ->orderBy('cards.showfirst', 'asc')
            ->paginate(20);
        }else if ($request->cityid != "" && $request->smid == "") {
            $getCards = cardsModal::select('*', 'cards.id as cardid', 'categories.id as categoryid')
            ->join('categories', 'categories.id', '=', 'cards.cid')
            ->where('categories.id', '=', $request->cid)
            ->where('cards.cityid', '=', $request->cityid)
            ->orderBy('cards.showfirst', 'asc')
            ->paginate(20);
        } else if ($request->smid != "" && $request->cityid != "") {
            $getCards = cardsModal::select('*', 'cards.id as cardid', 'categories.id as categoryid')
            ->join('categories', 'categories.id', '=', 'cards.cid')
            ->where('categories.id', '=', $request->cid)
            ->where('cards.smid', '=', $request->smid)
            ->where('cards.cityid', '=', $request->cityid)
            ->orderBy('cards.showfirst', 'asc')
            ->paginate(20);
        } else {
            $getCards = cardsModal::select('cards.*')
            ->join('categories', 'categories.id', '=', 'cards.cid')
            ->where('categories.id', '=', $request->cid)
            ->orderBy('cards.showfirst', 'asc')
            ->paginate(20);
        }

        //$getCards = cardsModal::select('*', 'cards.id as cardid')->paginate(20);
        //return $getCards;

        


        if ($request->json == "true") {
            return view('includes.categoriescards')->with([
                'getCards' => $getCards
            ]);
        }

        return view('categories')->with([
            'getAdvertisement' => $getAdvertisement,
            'getCities' => $getCities,
            'getCards' => $getCards,
            'getSmallCategories' => $getSmallCategories
        ]);

    }
}
