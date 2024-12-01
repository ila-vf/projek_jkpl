<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class paket_kiloan extends Model
{
    use HasFactory;
    protected $fillable = [
        'outlet_id',
        'nama',
        'deskripsi',
        'harga'
    ];

    public function paket_kiloan_transaksis(): BelongsToMany
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

        static::creating(function ($data) {
            $data->paket_code = 'PKX_' . time() . '_' . strtoupper(substr(md5(uniqid()), 0, 3));
        });
    }
}
