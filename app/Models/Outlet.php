<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Outlet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'hotline',
        'email'
    ];

    public $timestamps = false;

    public function transaksis(): HasMany
    {
        return $this->hasMany(Transaksi::class);
    }
    public function paket_kiloans(): HasMany
    {
        return $this->hasMany(paket_kiloan::class);
    }
    public function paket_satuans(): HasMany
    {
        return $this->hasMany(PaketSatuan::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($outlet) {
            $outlet->outlet_code = 'OTX_' . time() . '_' . strtoupper(substr(md5(uniqid()), 0, 3));
        });
    }
}
