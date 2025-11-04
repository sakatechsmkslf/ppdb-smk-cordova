@extends('layout.main')
@section('title', 'Detail Pendaftar')

@section('main')
    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            <!--begin::Breadcrumb-->
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pendaftaran.index') }}">Pendaftar</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
            <!--end::Breadcrumb-->
        </div>
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Pendaftar</h3>
                    <div class="card-tools">
                        <a href="{{ route('pendaftaran.index') }}" class="btn btn-sm btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Status Badge --}}
                    <div class="alert alert-info mb-4">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="mb-0">
                                    <strong>Nomor Pendaftaran:</strong> {{ $pendaftar->nomor_pendaftaran }}
                                </h5>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <span
                                    class="badge
                                    @if ($pendaftar->status == 'diterima') bg-success
                                    @elseif($pendaftar->status == 'ditolak') bg-danger
                                    @else bg-warning @endif fs-6">
                                    {{ strtoupper($pendaftar->status) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Foto Profil --}}
                        <div class="col-md-3 text-center mb-4">
                            <img src="{{ asset('foto/' . $pendaftar->foto) }}" alt="Foto {{ $pendaftar->nama_lengkap }}"
                                class="img-fluid rounded shadow" style="max-width: 250px;">
                        </div>

                        {{-- Data Pribadi --}}
                        <div class="col-md-9">
                            <div class="card mb-3">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0"><i class="bi bi-person-fill"></i> Data Pribadi</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <strong>Nama Lengkap:</strong><br>
                                            {{ $pendaftar->nama_lengkap }}
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>NIK:</strong><br>
                                            {{ $pendaftar->nik }}
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>NISN:</strong><br>
                                            {{ $pendaftar->nisn }}
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>Jenis Kelamin:</strong><br>
                                            {{ $pendaftar->jkel == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>Tempat, Tanggal Lahir:</strong><br>
                                            {{ $pendaftar->tempat_lahir }},
                                            {{ date('d-m-Y', strtotime($pendaftar->tanggal_lahir)) }}
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>Golongan Darah:</strong><br>
                                            {{ $pendaftar->gol_darah }}
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>No. HP:</strong><br>
                                            <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $pendaftar->no_hp)) }}"
                                                target="_blank" class="text-decoration-none">
                                                <i class="bi bi-whatsapp text-success"></i> {{ $pendaftar->no_hp }}
                                            </a>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <strong>Email:</strong><br>
                                            <a href="mailto:{{ $pendaftar->email }}">{{ $pendaftar->email }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Alamat --}}
                    <div class="card mb-3">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="bi bi-geo-alt-fill"></i> Alamat</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <strong>Alamat Lengkap:</strong><br>
                                    {{ $pendaftar->alamat }}
                                </div>
                                <div class="col-md-3 mb-3">
                                    <strong>RT/RW:</strong><br>
                                    {{ $pendaftar->rt }}/{{ $pendaftar->rw }}
                                </div>
                                <div class="col-md-3 mb-3">
                                    <strong>Dusun:</strong><br>
                                    {{ $pendaftar->dusun }}
                                </div>
                                <div class="col-md-3 mb-3">
                                    <strong>Desa:</strong><br>
                                    {{-- {{ $pendaftar->desa }} --}}
                                    {{-- {{ DB::table('indonesia_villages')->where('id', $pendaftar->desa)->first() }} --}}
                                    @foreach (DB::table('indonesia_villages')->where('id', $pendaftar->desa)->get() as $item)
                                        {{ $item->name ?? '' }}
                                    @endforeach
                                </div>
                                <div class="col-md-3 mb-3">
                                    <strong>Kecamatan:</strong><br>
                                    @foreach (DB::table('indonesia_districts')->where('id', $pendaftar->kecamatan)->get() as $item)
                                        {{ $item->name ?? '' }}
                                    @endforeach
                                </div>
                                <div class="col-md-4 mb-3">
                                    <strong>Kabupaten:</strong><br>
                                    @foreach (DB::table('indonesia_cities')->where('id', $pendaftar->kabupaten)->get() as $item)
                                        {{ $item->name ?? '' }}
                                    @endforeach
                                </div>
                                <div class="col-md-4 mb-3">
                                    <strong>Provinsi:</strong><br>
                                    @foreach (DB::table('indonesia_provinces')->where('id', $pendaftar->provinsi)->get() as $item)
                                        {{ $item->name ?? '' }}
                                    @endforeach
                                </div>
                                <div class="col-md-4 mb-3">
                                    <strong>Kode Pos:</strong><br>
                                    {{ $pendaftar->kodepos }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Data Pendidikan --}}
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-header bg-info text-white">
                                    <h5 class="mb-0"><i class="bi bi-book-fill"></i> Data Pendidikan</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <strong>Asal Sekolah:</strong><br>
                                        {{ $pendaftar->asalsekolah }}
                                    </div>
                                    <div class="mb-3">
                                        <strong>Jurusan yang Dipilih:</strong><br>
                                        <span class="badge bg-primary">{{ $pendaftar->jurusan }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Gelombang:</strong><br>
                                        {{ $pendaftar->gelombang->nama_gelombang ?? '-' }}
                                    </div>
                                    <div class="mb-3">
                                        <strong>Rekomendasi:</strong><br>
                                        {{ $pendaftar->rekomendasi }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Data Orang Tua --}}
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-header bg-warning">
                                    <h5 class="mb-0"><i class="bi bi-people-fill"></i> Data Orang Tua / Wali</h5>
                                </div>
                                <div class="card-body">
                                    {{-- Ayah --}}
                                    <div class="mb-3 pb-3 border-bottom">
                                        <h6 class="text-primary">Data Ayah</h6>
                                        <div class="row">
                                            <div class="col-12 mb-2">
                                                <strong>Nama:</strong> {{ $pendaftar->nama_ayah }}
                                            </div>
                                            <div class="col-6">
                                                <strong>Pekerjaan:</strong><br>{{ $pendaftar->pekerjaan_ayah }}
                                            </div>
                                            <div class="col-6">
                                                <strong>Pendidikan:</strong><br>{{ $pendaftar->pendidikan_ayah }}
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Ibu --}}
                                    <div class="mb-3 pb-3 border-bottom">
                                        <h6 class="text-primary">Data Ibu</h6>
                                        <div class="row">
                                            <div class="col-12 mb-2">
                                                <strong>Nama:</strong> {{ $pendaftar->nama_ibu }}
                                            </div>
                                            <div class="col-6">
                                                <strong>Pekerjaan:</strong><br>{{ $pendaftar->pekerjaan_ibu }}
                                            </div>
                                            <div class="col-6">
                                                <strong>Pendidikan:</strong><br>{{ $pendaftar->pendidikan_ibu }}
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Wali --}}
                                    <div>
                                        <h6 class="text-primary">Data Wali</h6>
                                        <div class="row">
                                            <div class="col-12 mb-2">
                                                <strong>Nama:</strong> {{ $pendaftar->nama_wali ?? '-' }}
                                            </div>
                                            <div class="col-6">
                                                <strong>Pekerjaan:</strong><br>{{ $pendaftar->pekerjaan_wali ?? '-' }}
                                            </div>
                                            <div class="col-6">
                                                <strong>Pendidikan:</strong><br>{{ $pendaftar->pendidikan_wali ?? '-' }}
                                            </div>
                                            <div class="col-12 mt-2">
                                                <strong>No. Telp:</strong> {{ $pendaftar->telp_wali ?? '-' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Dokumen --}}
                    <div class="card mb-3">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="mb-0"><i class="bi bi-file-earmark-text-fill"></i> Dokumen Pendukung</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <strong>Kartu Keluarga:</strong><br>
                                    <a href="{{ asset('kk/' . $pendaftar->kk) }}" target="_blank"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i> Lihat
                                    </a>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <strong>KTP Orang Tua:</strong><br>
                                    <a href="{{ asset('ktp/' . $pendaftar->ktp_ortu) }}" target="_blank"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i> Lihat
                                    </a>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <strong>Akta Lahir:</strong><br>
                                    <a href="{{ asset('akta/' . $pendaftar->aktalahir) }}" target="_blank"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i> Lihat
                                    </a>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <strong>KIP:</strong><br>
                                    @if ($pendaftar->kip)
                                        <a href="{{ asset('kip/' . $pendaftar->kip) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i> Lihat
                                        </a>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </div>
                                <div class="col-md-3 mb-3">
                                    <strong>PKH:</strong><br>
                                    @if ($pendaftar->pkh)
                                        <a href="{{ asset('pkh/' . $pendaftar->pkh) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i> Lihat
                                        </a>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </div>
                                <div class="col-md-3 mb-3">
                                    <strong>KKS:</strong><br>
                                    @if ($pendaftar->kks)
                                        <a href="{{ asset('kks/' . $pendaftar->kks) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i> Lihat
                                        </a>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="card">
                        <div class="card-body text-center">
                            <a href="{{ route('pendaftaran.edit', $pendaftar->id) }}" class="btn btn-warning">
                                <i class="bi bi-pencil"></i> Edit Data
                            </a>
                            <form action="{{ route('pendaftaran.destroy', $pendaftar->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-delete">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Row-->
@endsection

@push('script')
    <script>
        // Konfirmasi Delete
        document.querySelector('.btn-delete')?.addEventListener('click', function(e) {
            e.preventDefault();
            const form = this.closest('form');

            Swal.fire({
                title: 'Hapus Data Pendaftar?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
@endpush
