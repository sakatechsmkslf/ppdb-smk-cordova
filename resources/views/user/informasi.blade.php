{{-- @extends('user.layout')

@section('title', 'Daftar - SPMB SMK Cordova')

@section('main')
    <h2>Informasi Pendaftaran</h2>
    <p>Silakan isi data diri untuk mendaftar.</p>
@endsection --}}
@extends('user.layout')

@section('title', 'Informasi Pendaftaran - SPMB SMK Cordova')

@section('main')
    <div class="container my-5">
        <!-- Header Card -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white text-center py-4">
                <h3 class="mb-0 fw-bold">INFORMASI SPMB</h3>
            </div>
            <div class="card-body p-4 p-md-5">
                <h5 class="text-center mb-4 pb-3 border-bottom">INFORMASI AKUN CALON PESERTA DIDIK</h5>

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Search Form -->
                <form action="" method="post">
                    @csrf
                    <div class="row g-3 align-items-end">
                        <div class="col-md-10">
                            <label for="nik" class="form-label fw-semibold">NIK</label>
                            <input type="text" class="form-control form-control-lg @error('nik') is-invalid @enderror"
                                id="nik" name="nik" placeholder="Masukkan NIK (16 digit)"
                                value="{{ old('nik') }}" maxlength="16" required>
                            @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success btn-lg w-100">
                                <i class="bi bi-search me-1"></i> Periksa
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Result Section -->
        @if (isset($pendaftar))
            <div class="card shadow-sm">
                <!-- Header Section -->
                <div class="card-header bg-white py-4 border-bottom-0">
                    <div class="text-center mb-4">
                        <img src="{{ asset('assets/img/logo-sekolah.png') }}" alt="Logo" class="mb-3"
                            style="height: 80px;" onerror="this.style.display='none'">
                        <h4 class="fw-bold mb-1">KOMITE SISTEM PENERIMAAN MURID BARU</h4>
                        <h5 class="fw-bold text-primary mb-2">SMK CORDOVA MARGOYOSO</h5>
                        <p class="text-muted small mb-0">Alamat: Kajen Margoyoso Pati Jawa Tengah Kode Pos 59154 Telp/Fax
                            (0295) 4150037 – 4150010</p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <h5 class="fw-bold text-decoration-underline mb-2">BUKTI PENDAFTARAN SPMB</h5>
                        <p class="mb-0">TAHUN PELAJARAN {{ $pendaftar->gelombang->tapel }} -
                            {{ $pendaftar->gelombang->judul }}</p>
                    </div>
                </div>

                <div class="card-body px-4 px-md-5 py-4">
                    <!-- Action Buttons -->
                    <div class="d-flex flex-wrap gap-2 justify-content-end mb-4">
                        <a href="{{ route('informasi.export', $pendaftar->id) }}" class="btn btn-danger">
                            <i class="bi bi-file-pdf me-1"></i> Download Bukti Pendaftaran
                        </a>
                        <a href="{{ route('informasi.formulir', $pendaftar->id) }}" class="btn btn-warning">
                            <i class="bi bi-file-earmark-text me-1"></i> Download Formulir
                        </a>
                        <button onclick="window.print()" class="btn btn-primary">
                            <i class="bi bi-printer me-1"></i> Cetak
                        </button>
                    </div>

                    <!-- Data Table -->
                    <div class="table-responsive">
                        <table class="table table-borderless" style="line-height: 2;">
                            <tbody>
                                <tr>
                                    <td class="fw-semibold" style="width: 30%;">Sekolah</td>
                                    <td style="width: 5%;">:</td>
                                    <td>SMK</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Pilihan Program</td>
                                    <td>:</td>
                                    <td class="text-uppercase fw-bold text-primary">{{ $pendaftar->jurusan }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Nama Peserta</td>
                                    <td>:</td>
                                    <td class="fw-bold">{{ $pendaftar->nama_lengkap }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Kode Unik</td>
                                    <td>:</td>
                                    <td>{{ $pendaftar->nomor_pendaftaran }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">NIK</td>
                                    <td>:</td>
                                    <td>{{ $pendaftar->nik }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Tanggal Daftar</td>
                                    <td>:</td>
                                    <td>{{ \Carbon\Carbon::parse($pendaftar->created_at)->format('d F Y H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Tanggal Tes</td>
                                    <td>:</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold">Status Pendaftaran</td>
                                    <td>:</td>
                                    <td>
                                        @if ($pendaftar->status == 'diterima')
                                            <span class="badge bg-success fs-6 px-3 py-2">PENDAFTARAN TELAH DITERIMA</span>
                                        @elseif($pendaftar->status == 'ditolak')
                                            <span class="badge bg-danger fs-6 px-3 py-2">PENDAFTARAN DITOLAK</span>
                                        @else
                                            <span class="badge bg-warning text-dark fs-6 px-3 py-2">PENDAFTARAN TELAH
                                                DIPROSES</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Additional Info -->
                    <div class="alert alert-info mt-4">
                        <div class="row">
                            <div class="col-md-6 mb-2 mb-md-0">
                                <strong>Email:</strong> {{ $pendaftar->email }}
                            </div>
                            <div class="col-md-6">
                                <strong>No. HP:</strong> {{ $pendaftar->no_hp }}
                            </div>
                        </div>
                    </div>

                    <!-- Footer Note -->
                    <div class="border-top pt-3 mt-4">
                        <p class="text-muted small mb-2">
                            <strong>Catatan:</strong>
                        </p>
                        <ul class="text-muted small mb-0">
                            <li>Simpan bukti pendaftaran ini dengan baik</li>
                            <li>Harap membawa bukti pendaftaran ini saat melakukan tes/verifikasi</li>
                            <li>Download formulir pendaftaran untuk dilengkapi dan diserahkan saat verifikasi</li>
                            <li>Untuk informasi lebih lanjut silakan hubungi panitia PPDB</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Detail Info Card (Collapsible) -->
            <div class="card shadow-sm mt-4 no-print">
                <div class="card-header bg-light">
                    <button class="btn btn-link text-decoration-none text-dark w-100 text-start" type="button"
                        data-bs-toggle="collapse" data-bs-target="#detailInfo">
                        <i class="bi bi-chevron-down me-2"></i> Lihat Detail Lengkap Pendaftar
                    </button>
                </div>
                <div class="collapse" id="detailInfo">
                    <div class="card-body">
                        <!-- Data Diri -->
                        <h6 class="fw-bold text-primary border-bottom pb-2 mb-3">A. DATA DIRI</h6>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <small class="text-muted d-block">Nama Lengkap</small>
                                <p class="mb-0">{{ $pendaftar->nama_lengkap }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <small class="text-muted d-block">NIK</small>
                                <p class="mb-0">{{ $pendaftar->nik }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <small class="text-muted d-block">Jenis Kelamin</small>
                                <p class="mb-0">{{ $pendaftar->jkel == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <small class="text-muted d-block">Tempat, Tanggal Lahir</small>
                                <p class="mb-0">{{ $pendaftar->tempat_lahir }},
                                    {{ \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->format('d F Y') }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <small class="text-muted d-block">Golongan Darah</small>
                                <p class="mb-0">{{ $pendaftar->gol_darah }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <small class="text-muted d-block">NISN</small>
                                <p class="mb-0">{{ $pendaftar->nisn }}</p>
                            </div>
                        </div>

                        <!-- Alamat -->
                        <h6 class="fw-bold text-primary border-bottom pb-2 mb-3 mt-4">B. ALAMAT</h6>
                        <div class="row mb-3">
                            <div class="col-12 mb-3">
                                <small class="text-muted d-block">Alamat Lengkap</small>
                                <p class="mb-0">
                                    {{ $pendaftar->alamat }}, RT {{ $pendaftar->rt }}/RW {{ $pendaftar->rw }},
                                    Dusun {{ $pendaftar->dusun }}, Desa {{ $pendaftar->desa }},
                                    Kec. {{ $pendaftar->kecamatan }}, Kab. {{ $pendaftar->kabupaten }},
                                    Prov. {{ $pendaftar->provinsi }}, {{ $pendaftar->kodepos }}
                                </p>
                            </div>
                        </div>

                        <!-- Pendidikan -->
                        <h6 class="fw-bold text-primary border-bottom pb-2 mb-3 mt-4">C. PENDIDIKAN SEBELUMNYA</h6>
                        <div class="row mb-3">
                            <div class="col-12 mb-3">
                                <small class="text-muted d-block">Asal Sekolah</small>
                                <p class="mb-0">{{ $pendaftar->asalsekolah }}</p>
                            </div>
                        </div>

                        <!-- Data Orang Tua -->
                        <h6 class="fw-bold text-primary border-bottom pb-2 mb-3 mt-4">D. DATA ORANG TUA</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <small class="text-muted d-block fw-bold">Data Ayah</small>
                                <hr class="my-2">
                                <small class="text-muted d-block">Nama</small>
                                <p class="mb-2">{{ $pendaftar->nama_ayah }}</p>
                                <small class="text-muted d-block">Pendidikan</small>
                                <p class="mb-2">{{ $pendaftar->pendidikan_ayah }}</p>
                                <small class="text-muted d-block">Pekerjaan</small>
                                <p class="mb-0">{{ $pendaftar->pekerjaan_ayah }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <small class="text-muted d-block fw-bold">Data Ibu</small>
                                <hr class="my-2">
                                <small class="text-muted d-block">Nama</small>
                                <p class="mb-2">{{ $pendaftar->nama_ibu }}</p>
                                <small class="text-muted d-block">Pendidikan</small>
                                <p class="mb-2">{{ $pendaftar->pendidikan_ibu }}</p>
                                <small class="text-muted d-block">Pekerjaan</small>
                                <p class="mb-0">{{ $pendaftar->pekerjaan_ibu }}</p>
                            </div>
                        </div>

                        @if ($pendaftar->nama_wali)
                            <!-- Data Wali -->
                            <h6 class="fw-bold text-primary border-bottom pb-2 mb-3 mt-4">E. DATA WALI</h6>
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <small class="text-muted d-block">Nama Wali</small>
                                    <p class="mb-0">{{ $pendaftar->nama_wali }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small class="text-muted d-block">No. Telepon</small>
                                    <p class="mb-0">{{ $pendaftar->telp_wali }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small class="text-muted d-block">Pendidikan</small>
                                    <p class="mb-0">{{ $pendaftar->pendidikan_wali }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <small class="text-muted d-block">Pekerjaan</small>
                                    <p class="mb-0">{{ $pendaftar->pekerjaan_wali }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Print Styles -->
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            .card,
            .card * {
                visibility: visible;
            }

            .card {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                box-shadow: none !important;
                border: none !important;
            }

            .no-print,
            button,
            .btn,
            .alert {
                display: none !important;
            }

            .card-header {
                background-color: white !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            @page {
                margin: 2cm;
            }
        }

        /* Custom Styles */
        .table td {
            padding: 0.5rem 0;
        }

        .card {
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .card-header {
            border-radius: 0.5rem 0.5rem 0 0 !important;
        }
    </style>

    <!-- Bootstrap Icons (if not included) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
@endsection
