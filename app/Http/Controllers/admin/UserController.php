<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // This method will show user page
    public function index(Request $request) 
    {
        $users = User::where('id', '!=', 1)->get();

        if ($request->username) {
            $users = User::where('username', 'like', '%'.$request->username.'%')->get();

        }
        else {
            $users = User::where('id', '!=', 1)->get();
        }
        return view('users.userdata', ['users' => $users]);
    }

    //This method will show create user page
    public function create()
    {
        return view('users.create');
    }

    // This method will store a user db
    public function store(Request $request)
    {
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

        if ($validator->fails()) {
            return redirect()->route('users.create')->withInput()->withErrors($validator);
        }

        // Here we will insert user in db
        $users = new User();
        $users->username = $request->username;
        $users->alamat = $request->alamat;
        $users->email = $request->email;
        $users->namalengkap = $request->namalengkap;
        $users->password = Hash::make($request->password);
        $users->role = 'user' or 'petugas';
        $users->save();

        if ($request->foto != "") {
            // here we will store image
            $image = $request->foto;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext; // Unique image name

            // Save image to user directory
            $image->move(public_path('user'),$imageName);

            // Save image name in database
            $users->foto = $imageName;
            $users->save();
        } 

        return redirect()->route('users.userdata')->with('success','User added successfully.');
    }


    // This method will show edit user page
    public function edit(User $users)
    {
        return view('users.edituser', compact('users'));
    }

    // This method will update a user
    public function update(Request $request, User $users) {

        $rules = [
            'username',
            'email',
            'namalengkap', 
            'role',
        ];
        
        if ($request->image != "") {
            $rules['foto'] = 'foto';
        }


        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('users.edituser')->withInput()->withErrors($validator);
        }

        // Here we will update user
        $users->username = $request->username;
        $users->alamat = $request->alamat;
        $users->email = $request->email;
        $users->namalengkap = $request->namalengkap;
        $users->role = 'user' or 'petugas';
        $users->save();

        if ($request->foto != "") {

            // delete old image 
            File::delete(public_path('user/' . $users->foto));

            // here we will store image
            $image = $request->foto;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext; // Unique image name

            // Save image to project directory
            $image->move(public_path('user'),$imageName);

            // Save image name in database
            $users->foto = $imageName;
            $users->save();
        } 

        return redirect()->route('users.userdata')->with('success','User updated successfully.');
    }

    // This method will delete a user
    public function destroy(User $users) {

        File::delete(public_path('user/' . $users->foto));

       // delete user from database
       $users->delete();

       return redirect()->route('users.userdata')->with('success','User deleted successfully.');
    }

}
