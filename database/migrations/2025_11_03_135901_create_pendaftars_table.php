<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gelombang_id')->constrained()->onDelete('cascade');
            $table->string('nomor_pendaftaran');
            $table->string('jurusan');
            $table->string('nama_lengkap');
            $table->string('no_hp');
            $table->string('email');
            $table->enum('jkel', ['L', 'P']);
            $table->enum('gol_darah', ['A', 'B', 'AB', 'O', '-']);
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('dusun');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('kodepos');
            $table->string('asalsekolah');
            $table->string('nisn');
            $table->string('rekomendasi');
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('pendidikan_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('pendidikan_ibu');
            $table->string('nama_wali');
            $table->string('pekerjaan_wali');
            $table->string('pendidikan_wali');
            $table->string('telp_wali');
            $table->string('foto');
            $table->string('kk');
            $table->string('ktp_ortu');
            $table->string('aktalahir');
            $table->string('kip')->nullable();
            $table->string('pkh')->nullable();
            $table->string('kks')->nullable();
            $table->enum('status', ['diproses', 'diterima', 'ditolak'])->default('diproses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftars');
    }
};
