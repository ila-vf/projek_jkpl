<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggan::create([
            'nama' => 'Kim Minji',
            'alamat' => 'Kepanjen Kidul',
            'no_telepon' => '098789654782',
            'gender' => 'P'
        ]);
        Pelanggan::create([
            'nama' => 'Kang Haerin',
            'alamat' => 'Kepanjen Kidul',
            'no_telepon' => '098789834782',
            'gender' => 'P'
        ]);
        Pelanggan::create([
            'nama' => 'Rocky Gerung',
            'alamat' => 'Sanankulon',
            'no_telepon' => '098229654782',
            'gender' => 'L'
        ]);
        Pelanggan::create([
            'nama' => 'Ahmed Hibatillah',
            'alamat' => 'Wonadadi',
            'no_telepon' => '098786384782',
            'gender' => 'L'
        ]);
        Pelanggan::create([
            'nama' => 'Pamungkas',
            'alamat' => 'Tangerang Selatan',
            'no_telepon' => '098782284782',
            'gender' => 'L'
        ]);
    }
}
