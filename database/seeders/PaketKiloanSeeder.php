<?php

namespace Database\Seeders;

use App\Models\paket_kiloan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketKiloanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        paket_kiloan::create([
            'nama' => 'Paket A',
            'deskripsi' => 'Paket kiloan standar',
            'outlet_id' => 1,
            'harga'=> 8000
        ]);
        paket_kiloan::create([
            'nama' => 'Paket B',
            'deskripsi' => 'Paket kiloan premium',
            'outlet_id' => 1,
            'harga'=> 10000
        ]);
    }
}
