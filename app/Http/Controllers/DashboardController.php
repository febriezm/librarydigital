<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Ulasanbuku;
use App\Models\Kategoribuku;
use Illuminate\Http\Request;
use App\Models\Koleksipribadi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    // This method will show dashboard page for user
    public function index() 
    {
        return view('dashboard');
    }

    public function profile() 
    {
        $koleksipribadi = Koleksipribadi::with(['user', 'book'])->where('user_id' , Auth::user()->id)->get();
        return view('profile', ['koleksipribadi' => $koleksipribadi]);
    }

    public function destroy(Koleksipribadi $koleksi) {
 
        // delete koleksipribadi from database
        $koleksi->delete();
 
        return redirect()->route('account.profile')->with('success','History books deleted successfully.');
     }

    public function kembali(Request $request)
    {
        //user & buku yang di pilih untuk dikembalikan benar, maka berhasil mengembalikan buku
        //user & buku yang di pilih untuk dikembalikan salah, maka akan muncul alert error

        $kembali = Peminjaman::where('user_id', $request->user_id)->where('book_id', $request->book_id)->
        where('tgl_dikembalikan', null);
        $datakembali = $kembali->first();
        $countdata = $kembali->count();
        
        if($countdata == 1) {
            //buku dikembalikan
            $datakembali->tgl_dikembalikan = Carbon::now()->toDateString();
            $datakembali->status = 'Kembali';
            $datakembali->save();

            //process update book table
                $book = Book::findOrFail($request->book_id);
                $book->status = 'In stock';
                $book->save();
                DB::commit();

            Session::flash('success', 'The Books returned successfully.');
            return redirect()->route('account.profile');
        }
        else {
            //error alert muncul
            Session::flash('error', 'The Books has been returned.');
            return redirect()->route('account.profile');
        }
    }

    public function books(Request $request) 
    {
        $kategoris = Kategoribuku::all();

        if ($request->namakategori||$request->judul) {
            $books = Book::where('judul', 'like', '%'.$request->judul.'%')
            ->whereHas('kategoris', function($q) use($request) {
                $q->where('kategoribukus.id', $request->namakategori);
            })->get();
        }
        else {
            $books = Book::all();
        }

        return view('booklist', ['books' => $books, 'kategoris' => $kategoris]);
    }

    public function comment(Request $request)
    {
        $rules = [
            'user_id' => 'required',
            'book_id' => 'required',
            'ulasan' => 'required',
            'rating' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('account.books')->withInput()->withErrors($validator);
        }

        // Here we will insert book in db
        $comment = new Ulasanbuku();
        $comment->user_id = $request->user_id;
        $comment->book_id = $request->book_id;
        $comment->ulasan = $request->ulasan;
        $comment->rating = $request->rating;
        $comment->save();

        return redirect()->route('account.books')->with('success','The Reviews Books successfully.');

    }
    
    public function borrow()
    {
        $users = User::where('id', '!=', 1)->get();
        $books = Book::all();
        return view('borrow', ['users' => $users, 'books' => $books]);
    }

    public function store (Request $request)
    {
        $request['tgl_pinjam'] = Carbon::now()->toDateString();
        $request['tgl_kembali'] = Carbon::now()->addDay(3)->toDateString();

        $book = Book::findOrFail($request->book_id)->only('status');

        if($book['status'] != 'In stock') {
            Session::flash('error', 'Cannot be borrowed, books are not available.');
            return redirect()->route('account.borrow');
        }
        else {
            $count = Peminjaman::where('user_id', $request->user_id)->where('tgl_dikembalikan', null)->count();
            
            if($count >= 3) {
                Session::flash('error', 'Cannot be borrowed, user has reach limit of book.');
                return redirect()->route('account.borrow');
            }
            else {

                try {

                // process insert to peminjaman and koleksipribadi table
                DB::beginTransaction();
                Peminjaman::create($request->all());
                Koleksipribadi::create($request->all());
                
                // process update book table
                $book = Book::findOrFail($request->book_id);
                $book->status = 'Not available';
                $book->save();
                DB::commit();

                Session::flash('success', 'Books Successfully Borrowed.');
                return redirect()->route('account.borrow');

                } catch (\Throwable $th) {
                    DB::rollBack();
                }

            }

        }
    }

    public function reviews()
    {
        $ulasan = Ulasanbuku::paginate(6);
        return view('reviews', ['ulasan' => $ulasan]);
    }
}
