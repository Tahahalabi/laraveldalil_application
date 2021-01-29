<?php

namespace App\Http\Controllers\auth\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Redirect;
use Illuminate\Hashing\BcryptHasher;
use App\users;
use DB;
use Hash;

class loginController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->get('userinfo') == "") {

            return view('admin.auth.login.login');
        } else {
            return redirect("/admin/panel");
        }
    }

    public function login(Request $request)
    {
        if ($request->session()->get('userinfo') == "") {

            
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if ($validator->fails()) {
                return Redirect::to('login')->withErrors($validator)
                ->withInput();
            } else {
                $check = users::select('*')->where('email', '=', $request->input('email'))
                ->get();

                if (count($check) == 1) {
                    if (password_verify($request->input('password'), $check[0]->password) == "1") {
                        $request->session()->put('userinfo', $check[0]);

                        return Redirect::to('/admin/panel');
                    } else {
                        return Redirect::to('login')->withErrors([
                            'passwordincorrect' => 'Incorrect Password',
                        ])->withInput();
                    }
                } else {
                    return Redirect::to('login')->withErrors([
                        'incorrect' => 'check your credentials',
                    ])->withInput();
                }
            }
        } else {
            return "you are already logged in";
        }
    }

}
