<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'harga_total',
        'harga_bayar',
        'harga_kembali'
    ];

    public function transaksi(): HasOne
    {
        return $this->hasOne(Transaksi::class, 'invoice_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($data) {
            $data->invoice_code = 'IVC_' . time() . '_' . strtoupper(substr(md5(uniqid()), 0, 3));
        });
    }
}
