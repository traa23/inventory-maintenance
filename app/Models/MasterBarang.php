<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang', 'nama_barang', 'kategori', 'satuan',
        'stok_ready', 'stok_repair', 'stok_scrap', 'spesifikasi', 'aktif',
    ];

    protected function casts(): array
    {
        return ['aktif' => 'boolean'];
    }

    public function transaksiPenukarans(): HasMany
    {
        return $this->hasMany(TransaksiPenukaran::class);
    }

    public function workOrders(): HasMany
    {
        return $this->hasMany(WorkOrder::class);
    }
}
