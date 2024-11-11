<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Ulasanbuku;
use App\Models\Kategoribuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
     // This method will show dashboard page for admin
     public function index() 
    {
        $peminjamans = Peminjaman::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->whereYear('created_at',date('Y'))
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        $labels = [];
        $data = [];
        $colors = ['#00264A', '#36A2EB', '#FFCE56', '#8BC34A', '#FF5722', '#009688', '#795538', '#FF2342', '#000000', '#FF6384', '#123123', '#987986', '#366963'];

        for ($i=1; $i <= 12; $i++) {
            $month = date('F',mktime(0,0,0,$i,1));
            $count = 0;

            foreach($peminjamans as $peminjaman) {
                if($peminjaman->month == $i){
                    $count = $peminjaman->count;
                    break;
                }
            }

            array_push($labels,$month);
            array_push($data,$count);
        }

        $datasets = [
            [
                'label' => 'Peminjaman Buku',
                'data' => $data,
                'backgroundColor' => $colors
            ]
            ];

        $userCount = User::count();
        $peminjamanCount = Peminjaman::count();
        $kategoribukuCount = Kategoribuku::count();
        $ulasanbukuCount = Ulasanbuku::count();
        $bookCount = Book::count();
        return view('admin.dashboard', [
            'user_count' => $userCount, 'peminjaman_count' => $peminjamanCount, 'kategoribuku_count' => $kategoribukuCount,
            'ulasanbuku_count' => $ulasanbukuCount, 'book_count' => $bookCount
        ], compact('datasets','labels'));

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
