<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Outlet::create([
            'nama' => 'Outlet A',
            'alamat' => 'Jalan Contoh No. 123',
            'hotline' => '08123456789',
            'email' => 'outletA@example.com',
        ]);

        Outlet::create([
            'nama' => 'Outlet B',
            'alamat' => 'Jalan Percobaan No. 456',
            'hotline' => '08234567890',
            'email' => 'outletB@example.com',
        ]);

        Outlet::create([
            'nama' => 'Outlet C',
            'alamat' => 'Jalan Uji Coba No. 789',
            'hotline' => '08345678901',
            'email' => 'outletC@example.com',
        ]);
}
}
