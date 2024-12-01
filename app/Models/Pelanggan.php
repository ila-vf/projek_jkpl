<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'no_telepon',
        'gender',
    ];

    public function transaksis(): HasMany
    {
        return $this->hasMany(Transaksi::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pelanggan) {
            $pelanggan->pelanggan_code = 'PLX_' . time() . '_' . strtoupper(substr(md5(uniqid()), 0, 3));
        });
    }
}
