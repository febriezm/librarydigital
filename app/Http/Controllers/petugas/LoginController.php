<?php

namespace App\Http\Controllers\petugas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
      // This method will show petugas login page/screen
    public function index() {
        return view('petugas.login');
    }

    // This method will authenticate petugas
    public function authenticate(Request $request) {

        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required'
        ]);

        if($validator->passes()) {

            if(Auth::guard('petugas')->attempt(['username' => $request->username,'password' => $request->password])) {
                if(Auth::guard('petugas')->user()->role != "petugas") {
                    Auth::guard('petugas')->logout();
                    return redirect()->route('petugas.login')->with('error','You are not authorized to access this page.');
                }

                return redirect()->route('petugas.dashboard')->with('success','You successfully logged in.');

            } else {
                return redirect()->route('petugas.login')->with('error','Either email or password is incorrent.');
            }

        } else {
            return redirect()->route('petugas.login')
                ->withInput()
                ->withErrors($validator);
        }
    }

    // This method will logout petugas
    public function logout() {
        Auth::guard('petugas')->logout();
        return redirect()->route('petugas.login')->with('success','You successfully logged out.');
    }
}
