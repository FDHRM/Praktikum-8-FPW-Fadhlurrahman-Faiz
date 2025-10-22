<?php

namespace Database\Seeders;

use App\Models\KategoriBuku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Kategori = [
            ['nama_kategori' => 'Fiksi'],
            ['nama_kategori' => 'Non-Fiksi'],
            ['nama_kategori' => 'Teknologi'],
            ['nama_kategori' => 'Sejarah'],
            ['nama_kategori' => 'Pendidikan'],
        ];  

        foreach ($Kategori as $item) {
            KategoriBuku::create($item);
        }
    }
}
