<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('master_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->string('nama_barang');
            $table->string('kategori')->nullable();
            $table->string('satuan')->default('unit');
            $table->unsignedInteger('stok_ready')->default(0);
            $table->unsignedInteger('stok_repair')->default(0);
            $table->unsignedInteger('stok_scrap')->default(0);
            $table->text('spesifikasi')->nullable();
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });

        Schema::create('transaksi_penukarans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_transaksi')->unique();
            $table->foreignId('master_barang_id')->constrained('master_barangs');
            $table->string('nama_pekerja_lapangan');
            $table->string('nomor_identitas_pekerja')->nullable();
            $table->unsignedInteger('jumlah')->default(1);
            $table->string('status_awal')->default('repair');
            $table->text('uraian_kerusakan')->nullable();
            $table->string('foto_before')->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->timestamp('diterima_at')->useCurrent();
            $table->timestamps();
        });

        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_wo')->unique();
            $table->foreignId('transaksi_penukaran_id')->constrained('transaksi_penukarans');
            $table->foreignId('master_barang_id')->constrained('master_barangs');
            $table->string('nama_teknisi')->nullable();
            $table->string('status')->default('open');
            $table->text('detail_kerusakan')->nullable();
            $table->text('rincian_perbaikan')->nullable();
            $table->string('foto_after')->nullable();
            $table->foreignId('dibuat_oleh')->constrained('users');
            $table->foreignId('ditutup_oleh')->nullable()->constrained('users');
            $table->timestamp('dibuat_at')->useCurrent();
            $table->timestamp('ditutup_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('work_orders');
        Schema::dropIfExists('transaksi_penukarans');
        Schema::dropIfExists('master_barangs');
    }
};
