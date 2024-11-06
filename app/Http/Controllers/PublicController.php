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
        $kategoris = Kategoribuku::all();

        if ($request->namakategori) {
            $books = Book::whereHas('kategoris', function($q) use($request) {
                $q->where('kategoribukus.id', $request->namakategori);
            })->get();
        }
        else {
            $books = Book::all();
        }

        return view('welcome', ['books' => $books, 'kategoris' => $kategoris]);
    }
}

