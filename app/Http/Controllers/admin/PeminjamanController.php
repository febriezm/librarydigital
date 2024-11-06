<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['user', 'book'])->get();
        return view('peminjaman.peminjaman', ['peminjaman' => $peminjaman]);

    }

    public function cetak()
    {
        $peminjaman = Peminjaman::with(['user', 'book'])->get();
        return view('peminjaman.cetak', ['peminjaman' => $peminjaman]);

    }

    public function destroy(Peminjaman $peminjamen) {
 
        // delete peminjaman from database
        $peminjamen->delete();
 
        return redirect()->route('peminjaman.peminjaman')->with('success','Borrowing data deleted successfully.');
     }
}
