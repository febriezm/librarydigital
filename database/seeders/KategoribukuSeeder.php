<?php

namespace Database\Seeders;

use App\Models\Kategoribuku;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoribukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Kategoribuku::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'comic', 'novel', 'fantasy', 'fiction', 'mystery', 'horror', 'romance', 'western'
        ];
        
        foreach ($data as $value) {
            Kategoribuku::insert([
                'namakategori' => $value
            ]);
        }
    }
}
