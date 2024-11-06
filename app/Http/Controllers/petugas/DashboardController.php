<?php

namespace App\Http\Controllers\petugas;

use App\Models\Book;
use App\Models\Peminjaman;
use App\Models\Kategoribuku;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['user', 'book'])->get();
        $peminjamanCount = Peminjaman::count();
        $kategoribukuCount = Kategoribuku::count();
        $bookCount = Book::count();
        return view('petugas.dashboard', [
            'peminjaman_count' => $peminjamanCount, 'kategoribuku_count' => $kategoribukuCount,
            'book_count' => $bookCount, 'peminjaman' => $peminjaman
        ]);
    }

     // This method will show book page
     public function buku(Request $request) 
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
 
         return view('petugas.buku', ['books' => $books, 'kategoris' => $kategoris]);
     }
 
     //This method will show create book page
     public function create()
     {
         $kategoris = Kategoribuku::all();
         return view('petugas.create', ['kategoris' => $kategoris]);
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
             return redirect()->route('petugas.create')->withInput()->withErrors($validator);
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
 
         return redirect()->route('petugas.buku')->with('success','Books added successfully.');
     }
 
 
     // This method will show edit book page
     public function edit(Book $books)
     {
         $kategoris = Kategoribuku::all();
         return view('petugas.edit',['kategoris' => $kategoris], compact('books'));
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
             return redirect()->route('petugas.edit')->withInput()->withErrors($validator);
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
 
         return redirect()->route('petugas.buku')->with('success','Books updated successfully.');
     }
 
     // This method will delete a book
     public function destroy(Book $books) {
          // delete image
        File::delete(public_path('storage/' . $books->foto));
 
        // delete book from database
        $books->delete();
 
        return redirect()->route('petugas.buku')->with('success','Books deleted successfully.');
     }

     public function peminjaman()
     {
        $peminjaman = Peminjaman::with(['user', 'book'])->get();
        return view('petugas.peminjaman', ['peminjaman' => $peminjaman]);
     }

     public function delete(Peminjaman $peminjamen) {
 
        // delete peminjaman from database
        $peminjamen->delete();
 
        return redirect()->route('petugas.peminjaman')->with('success','Borrowing data deleted successfully.');
     }

     public function cetak()
    {
        $peminjaman = Peminjaman::with(['user', 'book'])->get();
        return view('petugas.cetak', ['peminjaman' => $peminjaman]);

    }

    public function jenis() 
    {
        $kategoribukus = Kategoribuku::paginate(10);

        return view('petugas.jenis',  compact('kategoribukus'));
    }

    // This method will add a kategoribuku in petugas
    public function add(Request $request)
    {
        $rules = [
            'namakategori' => 'required|unique:kategoribukus',
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('petugas.jenis')->with('error','Kategori Buku already exists.');
        }

        // Here we will insert kategori buku in db
        $kategoribukus = new Kategoribuku();
        $kategoribukus->namakategori = $request->namakategori;
        $kategoribukus->save();

        return redirect()->route('petugas.jenis')->with('success','Kategori Buku added successfully.');
    }

    // This method will delete a kategori buku in petugas
    public function drop(Kategoribuku $kategoribukus) {
 
        // delete book from database
        $kategoribukus->delete();
 
        return redirect()->route('petugas.jenis')->with('success','Kategori Data deleted successfully.');
     }
}
