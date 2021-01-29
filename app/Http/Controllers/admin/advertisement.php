<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\advertisementModel;

class advertisement extends Controller
{
    public function index(Request $request)
    {
        $getAdvvertisementImage = advertisementModel::select('*')->where('id', '=', 1)
        ->first();

        return view('admin.panel.pages.advertisement')->with([
            'userinfo' => $request->session()->get("userinfo"),
            'getAdvvertisementImage' => $getAdvvertisementImage
        ]);
    }

    public function addupdate(Request $request)
    {

        $advertisement = advertisementModel::select('*')->where('id', '=', '1')->first();

        if ($request->hasFile('file')) {
            // Get filename with the extension
            $filenameWithExt = $request->file->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file->storeAs('public/uploads', $fileNameToStore);

            $advertisement->src = '/storage/uploads/' . $fileNameToStore;

            //$newabout->photo = '/storage/app/public/uploads/' . $fileNameToStore;


        } else {
            $advertisement->src = "";
        }

        $advertisement->save();

        return redirect("/admin/panel/advertisement");
        
    }
}
