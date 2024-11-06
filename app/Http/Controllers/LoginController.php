<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // This method will show login page for user
    public function index() {
        return view('login');
    }

    // This method will authenticate user
    public function authenticate(Request $request) {

        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required'
        ]);

        if($validator->passes()) {

            if(Auth::attempt(['username' => $request->username,'password' => $request->password])) {
                if(Auth::user()->role != "user") {
                    Auth::logout();
                    return redirect()->route('account.login')->with('error','You are not authorized to access this page.');
                }

                return redirect()->route('account.dashboard')->with('success','You successfully logged in.');

            } else {
                return redirect()->route('account.login')->with('error','Either email or password is incorrent.');
            }

        } else {
            return redirect()->route('account.login')
                ->withInput()
                ->withErrors($validator);
        }
    }

    // This method will show register page
    public function register() {
        return view('register');
    }

    Public function processRegister(Request $request) {
        $rules = [
            'username' => 'required',
            'password' => 'required|confirmed|min:5',
            'email' => 'required|email|unique:users',
            'namalengkap' => 'required',
            'password_confirmation' => 'required',
            'alamat' => 'required',
        ];

        if ($request->image != "") {
            $rules['foto'] = 'foto';
        }

        $validator = Validator::make($request->all(),$rules);

        if($validator->passes()) {

            $user = new User();
            $user->username = $request->username;
            $user->alamat = $request->alamat;
            $user->email = $request->email;
            $user->namalengkap = $request->namalengkap;
            $user->password = Hash::make($request->password);
            $user->role = 'user' or 'petugas';
            $user->save();

            if ($request->foto != "") {
                // here we will store image
                $image = $request->foto;
                $ext = $image->getClientOriginalExtension();
                $imageName = time().'.'.$ext; // Unique image name
    
                // Save image to user directory
                $image->move(public_path('user'),$imageName);
    
                // Save image name in database
                $user->foto = $imageName;
                $user->save();
            } 

            return redirect()->route('account.login')->with('success','You have registered successfully.');
        } else {
            return redirect()->route('account.register')
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('account.login')->with('success','You successfully logged out.');
    }
 }


