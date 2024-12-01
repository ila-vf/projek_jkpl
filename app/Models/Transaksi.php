<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_diantar',
        'tgl_selesai',
        'tgl_bayar',
        'status',
        'pelanggan_id',
        'outlet_id',
        'invoice_id',
        'created_at'
    ];

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function paket_kiloans(): BelongsToMany
    {
        return $this->belongsToMany(paket_kiloan::class)->withPivot('kilogram');
    }

    public function paket_satuans(): BelongsToMany
    {
        return $this->belongsToMany(PaketSatuan::class);
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    public function outlet(): BelongsTo
    {
        return $this->belongsTo(Outlet::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($transaction) {
            $transaction->transaksi_code = 'TRX_' . time() . '_' . strtoupper(substr(md5(uniqid()), 0, 3));
        });
    }
}
