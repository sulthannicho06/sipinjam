<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = [
        'alat_id',
        'nama_peminjam',
        'jumlah',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];

    public function alat(): BelongsTo
    {
        return $this->belongsTo(Alat::class);
    }
}