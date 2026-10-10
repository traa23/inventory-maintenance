<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TransaksiPenukaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_transaksi', 'master_barang_id', 'nama_pekerja_lapangan',
        'nomor_identitas_pekerja', 'jumlah', 'status_awal',
        'uraian_kerusakan', 'foto_before', 'created_by', 'diterima_at',
    ];

    protected function casts(): array
    {
        return ['diterima_at' => 'datetime'];
    }

    public function masterBarang(): BelongsTo
    {
        return $this->belongsTo(MasterBarang::class);
    }

    public function dibuatOleh(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function workOrder(): HasOne
    {
        return $this->hasOne(WorkOrder::class);
    }
}
