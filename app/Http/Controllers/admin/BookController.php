<?php

namespace App\Http\Controllers\admin;

use App\Models\Book;
use App\Models\Kategoribuku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
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

        return view('books.bookdata', ['books' => $books, 'kategoris' => $kategoris]);
    }

    //This method will show create book page
    public function create()
    {
        $kategoris = Kategoribuku::all();
        return view('books.create', ['kategoris' => $kategoris]);
    }

    // This method will store a book db
    public function store(Request $request)
    {
        $rules = [
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'th_terbit' => 'required|numeric',
        ];

        if ($request->image != "") {
            $rules['foto'] = 'foto';
        }

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('books.create')->withInput()->withErrors($validator);
        }

        // Here we will insert book in db
        $books = new Book();
        $books->judul = $request->judul;
        $books->penulis = $request->penulis;
        $books->penerbit = $request->penerbit;
        $books->th_terbit = $request->th_terbit;
        $books->save();

        if ($request->foto != "") {
            // here we will store image
            $image = $request->foto;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext; // Unique image name

            // Save image to project directory
            $image->move(public_path('storage'),$imageName);

            // Save image name in database
            $books->foto = $imageName;
            $books->save();
        } 

        $books->kategoris()->sync($request->kategoris);

        return redirect()->route('books.bookdata')->with('success','Books added successfully.');
    }


    // This method will show edit book page
    public function edit(Book $books)
    {
        $kategoris = Kategoribuku::all();
        return view('books.edit',['kategoris' => $kategoris], compact('books'));
    }

    // This method will update a book
    public function update(Request $request, Book $books) {

        $rules = [
            'judul',
            'penulis',
            'penerbit',
            'th_terbit' => 'numeric',
        ];

        if ($request->image != "") {
            $rules['foto'] = 'foto';
        }

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('books.edit')->withInput()->withErrors($validator);
        }

        // Here we will update book
        $books->judul = $request->judul;
        $books->penulis = $request->penulis;
        $books->penerbit = $request->penerbit;
        $books->th_terbit = $request->th_terbit;
        $books->save();

        if ($request->foto != "") {

            // delete old image 
            File::delete(public_path('storage/' . $books->foto));

            // here we will store image
            $image = $request->foto;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext; // Unique image name

            // Save image to project directory
            $image->move(public_path('storage'),$imageName);

            // Save image name in database
            $books->foto = $imageName;
            $books->save();
        } 

        $books->kategoris()->sync($request->kategoris);

        return redirect()->route('books.bookdata')->with('success','Books updated successfully.');
    }

    // This method will delete a book
    public function destroy(Book $books) {
         // delete image
       File::delete(public_path('storage/' . $books->foto));

       // delete book from database
       $books->delete();

       return redirect()->route('books.bookdata')->with('success','Books deleted successfully.');
    }

}
