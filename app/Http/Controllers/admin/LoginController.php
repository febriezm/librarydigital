<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // This method will show admin login page/screen
    public function index() {
        return view('admin.login');
    }

    // This method will authenticate admin 
    public function authenticate(Request $request) {

        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required'
        ]);

        if($validator->passes()) {

            if(Auth::guard('admin')->attempt(['username' => $request->username,'password' => $request->password])) {
                if(Auth::guard('admin')->user()->role != "admin") {
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->with('error','You are not authorized to access this page.');
                }

                return redirect()->route('admin.dashboard')->with('success','You successfully logged in.');

            } else {
                return redirect()->route('admin.login')->with('error','Either email or password is incorrent.');
            }

        } else {
            return redirect()->route('admin.login')
                ->withInput()
                ->withErrors($validator);
        }
    }

    // This method will logout admin
    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success','You successfully logged out.');
    }
}
