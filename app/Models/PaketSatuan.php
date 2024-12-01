<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaketSatuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'outlet_id',
        'nama',
        'deskripsi',
        'harga'
    ];

    public function paket_satuan_transaksi(): BelongsToMany
    {
        return $this->belongsToMany(Transaksi::class);
    }

    public function outlet(): BelongsTo
    {
        return $this->belongsTo(Outlet::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($paket_satuan) {
            $paket_satuan->paket_code = 'PSX_' . time() . '_' . strtoupper(substr(md5(uniqid()), 0, 3));
        });
    }
}
