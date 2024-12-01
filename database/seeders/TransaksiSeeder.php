<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaksi::create([
            'tgl_diantar' => '2023-05-28',
            'tgl_selesai' => '2023-05-28',
            'tgl_bayar' => null,
            'status' => 'Pending',
            'pelanggan_id' => 2,
            'outlet_id' => 1,
            'invoice_id' => null,
            'created_at' => '2023-05-28 07:54:17'
        ])->paket_kiloans()->attach(1);

        Transaksi::create([
            'tgl_diantar' => '2023-05-28',
            'tgl_selesai' => '2023-05-28',
            'tgl_bayar' => null,
            'status' => 'Pending',
            'pelanggan_id' => 4,
            'outlet_id' => 1,
            'invoice_id' => null,
            'created_at' => '2023-05-29 07:54:17'
        ])->paket_kiloans()->attach(2);

        Transaksi::create([
            'tgl_diantar' => '2023-06-28',
            'tgl_selesai' => '2023-06-28',
            'tgl_bayar' => null,
            'status' => 'Pending',
            'pelanggan_id' => 1,
            'outlet_id' => 1,
            'invoice_id' => null,
            'created_at' => '2023-06-28 07:54:17'
        ])->paket_kiloans()->attach(1);

        Transaksi::create([
            'tgl_diantar' => '2023-07-28',
            'tgl_selesai' => '2023-07-28',
            'tgl_bayar' => null,
            'status' => 'Pending',
            'pelanggan_id' => 5,
            'outlet_id' => 1,
            'invoice_id' => null,
            'created_at' => '2023-07-28 07:54:17'
        ])->paket_kiloans()->attach(1);
        
        Transaksi::create([
            'tgl_diantar' => '2023-07-28',
            'tgl_selesai' => '2023-07-28',
            'tgl_bayar' => null,
            'status' => 'Pending',
            'pelanggan_id' => 4,
            'outlet_id' => 1,
            'invoice_id' => null,
            'created_at' => '2023-07-28 07:54:17'
        ])->paket_kiloans()->attach(1);

        Transaksi::create([
            'tgl_diantar' => '2023-07-28',
            'tgl_selesai' => '2023-07-28',
            'tgl_bayar' => null,
            'status' => 'Pending',
            'pelanggan_id' => 5,
            'outlet_id' => 1,
            'invoice_id' => null,
            'created_at' => '2023-07-28 07:54:17'
        ])->paket_kiloans()->attach(2);
    }
}
