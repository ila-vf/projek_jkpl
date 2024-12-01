<?php

namespace Database\Seeders;

use App\Models\PaketSatuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketSatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaketSatuan::create([
            'nama' => 'Bed Cover',
            'outlet_id' => 1,
            'deskripsi' => 'Cuci satu set bed cover',
            'harga' => 20000
        ]);
        PaketSatuan::create([
            'nama' => 'Selimut',
            'outlet_id' => 1,
            'deskripsi' => 'Cuci berbagai jenis selimut',
            'harga' => 12000
        ]);
        PaketSatuan::create([
            'nama' => 'Karpet',
            'outlet_id' => 1,
            'deskripsi' => 'Cuci berbagai jenis karpet',
            'harga' => 25000
        ]);
    }
}
