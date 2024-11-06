<?php

namespace App\Http\Controllers\admin;

use App\Models\Kategoribuku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class KategoribukuController extends Controller
{
     // This method will show kategoribuku page
     public function index() 
     {
         $kategoribukus = Kategoribuku::all();
 
         return view('kategori.kategoridata',  compact('kategoribukus'));
     }
 
     // This method will store a kategoribuku db
     public function store(Request $request)
     {
         $rules = [
             'namakategori' => 'required|unique:kategoribukus',
         ];
 
         $validator = Validator::make($request->all(),$rules);
 
         if ($validator->fails()) {
             return redirect()->route('kategori.kategoridata')->with('error','Kategori Buku already exists.');
         }
 
         // Here we will insert kategori buku in db
         $kategoribukus = new Kategoribuku();
         $kategoribukus->namakategori = $request->namakategori;
         $kategoribukus->save();
 
         return redirect()->route('kategori.kategoridata')->with('success','Kategori Buku added successfully.');
     }
 
     // This method will delete a kategori buku
     public function destroy(Kategoribuku $kategoribukus) {
 
        // delete book from database
        $kategoribukus->delete();
 
        return redirect()->route('kategori.kategoridata')->with('success','Kategori Data deleted successfully.');
     }
}
