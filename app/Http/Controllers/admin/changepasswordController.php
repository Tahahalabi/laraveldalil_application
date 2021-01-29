<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\users;
use Hash;

class changepasswordController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.panel.pages.changepassword')->with([
            'userinfo' => $request->session()->get("userinfo"),
            'success' => ''
        ]);
    }
    
    public function change(Request $request)
    {
        $updateuser = users::find($request->userid);

        if ($request->email != "") {
            $updateuser->email = $request->email;
            $request->session()->get("userinfo")->email = $request->email;
        }

        if ($request->password != "") {
            $updateuser->password = Hash::make($request->password);
        }

        $updateuser->save();

        

        return view('admin.panel.pages.changepassword')->with([
            'userinfo' => $request->session()->get("userinfo"),
            'success' => 'updated'
        ]);
    }
}
