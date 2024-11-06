<?php

namespace App\Http\Controllers\admin;

use App\Models\Book;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Ulasanbuku;
use App\Models\Kategoribuku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
     // This method will show dashboard page for admin
     public function index() 
    {
        $peminjaman = Peminjaman::with(['user', 'book'])->get();
        $userCount = User::count();
        $peminjamanCount = Peminjaman::count();
        $kategoribukuCount = Kategoribuku::count();
        $ulasanbukuCount = Ulasanbuku::count();
        $bookCount = Book::count();
        return view('admin.dashboard', [
            'user_count' => $userCount, 'peminjaman_count' => $peminjamanCount, 'kategoribuku_count' => $kategoribukuCount,
            'ulasanbuku_count' => $ulasanbukuCount, 'book_count' => $bookCount, 'peminjaman' => $peminjaman
        ]);
    }

    public function ulasan()
    {
        $ulasan = Ulasanbuku::all();
        return view('admin.ulasan', ['ulasan' => $ulasan]);
    }

    public function destroy(Ulasanbuku $ulasanbuku) {
 
        // delete ulasan from database
        $ulasanbuku->delete();
 
        return redirect()->route('admin.ulasan')->with('success','Review book data deleted successfully.');
     }
}
