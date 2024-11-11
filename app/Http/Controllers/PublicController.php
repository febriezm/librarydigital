<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Kategoribuku;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    // This method will show book page
    public function index(Request $request) 
    {

        if ($request->judul) {
            $books = Book::where('judul', 'like', '%'.$request->judul.'%')->get();
        }
        else {
            $books = Book::all();
        }

        return view('welcome', ['books' => $books]);
    }
}

