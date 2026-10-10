<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_wo', 'transaksi_penukaran_id', 'master_barang_id',
        'nama_teknisi', 'status', 'detail_kerusakan', 'rincian_perbaikan',
        'foto_after', 'dibuat_oleh', 'ditutup_oleh', 'dibuat_at', 'ditutup_at',
    ];

    protected function casts(): array
    {
        return ['dibuat_at' => 'datetime', 'ditutup_at' => 'datetime'];
    }

    public function transaksiPenukaran(): BelongsTo
    {
        return $this->belongsTo(TransaksiPenukaran::class);
    }

    public function masterBarang(): BelongsTo
    {
        return $this->belongsTo(MasterBarang::class);
    }

    public function dibuatOleh(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }

    public function ditutupOleh(): BelongsTo
    {
        return $this->belongsTo(User::class, 'ditutup_oleh');
    }
}
