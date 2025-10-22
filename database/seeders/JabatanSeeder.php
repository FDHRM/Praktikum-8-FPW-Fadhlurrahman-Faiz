<?php

namespace Database\Seeders;

use App\Models\JabatanPengelola;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Jabatan = [
            ['nama_jabatan' => 'Manager'],
            ['nama_jabatan' => 'Asisten Manager'],
            ['nama_jabatan' => 'Kepala Bagian'],
            ['nama_jabatan' => 'Staff'],
        ];
        
        foreach ($Jabatan as $item) {
            JabatanPengelola::create($item);
        }
    }
}
