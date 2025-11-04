@extends('layout.main')

@section('main')
    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            <!--begin::Breadcrumb-->
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pendaftaran.index') }}">Pendaftar</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
            <!--end::Breadcrumb-->
        </div>
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            <form action="{{ route('pendaftaran.update', $pendaftaran->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Pendaftar</h3>
                        <div class="card-tools">
                            <a href="{{ route('pendaftaran.index') }}" class="btn btn-sm btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        {{-- Nomor Pendaftaran (Readonly) --}}
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label fw-bold">Nomor Pendaftaran</label>
                                <input type="text" class="form-control" value="{{ $pendaftaran->nomor_pendaftaran }}"
                                    readonly>
                            </div>
                        </div>

                        {{-- Pilihan Gelombang dan Jurusan --}}
                        <h5 class="border-bottom pb-2 mb-3 text-primary">Pilihan Gelombang dan Jurusan</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Gelombang <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ $pendaftaran->gelombang->judul }}"
                                    readonly>
                                @error('gelombang_id')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Jurusan <span class="text-danger">*</span></label>
                                <select name="jurusan" id="jurusan" class="form-select sel2"
                                    data-placeholder="Pilih Jurusan" required>
                                    <option value=""></option>
                                    <option value="Desain Komunikasi Visual"
                                        {{ old('jurusan', $pendaftaran->jurusan) == 'Desain Komunikasi Visual' ? 'selected' : '' }}>
                                        Desain Komunikasi Visual</option>
                                    <option value="Teknologi Farmasi"
                                        {{ old('jurusan', $pendaftaran->jurusan) == 'Teknologi Farmasi' ? 'selected' : '' }}>
                                        Teknologi Farmasi</option>
                                    <option value="Teknik Otomotif"
                                        {{ old('jurusan', $pendaftaran->jurusan) == 'Teknik Otomotif' ? 'selected' : '' }}>
                                        Teknik Otomotif</option>
                                    <option value="Teknik Kimia Industri"
                                        {{ old('jurusan', $pendaftaran->jurusan) == 'Teknik Kimia Industri' ? 'selected' : '' }}>
                                        Teknik Kimia Industri</option>
                                    <option value="Teknik Ketenagalistrikan"
                                        {{ old('jurusan', $pendaftaran->jurusan) == 'Teknik Ketenagalistrikan' ? 'selected' : '' }}>
                                        Teknik Ketenagalistrikan</option>
                                </select>
                                @error('jurusan')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Status Pendaftaran --}}
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold">Status Pendaftaran</label>
                                <select name="status" id="status" class="form-select sel2"
                                    data-placeholder="Pilih Status">
                                    <option value="diproses"
                                        {{ old('status', $pendaftaran->status) == 'diproses' ? 'selected' : '' }}>Diproses
                                    </option>
                                    <option value="diterima"
                                        {{ old('status', $pendaftaran->status) == 'diterima' ? 'selected' : '' }}>Diterima
                                    </option>
                                    <option value="ditolak"
                                        {{ old('status', $pendaftaran->status) == 'ditolak' ? 'selected' : '' }}>Ditolak
                                    </option>
                                </select>
                                @error('status')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Data Pribadi --}}
                        <h5 class="border-bottom pb-2 mb-3 text-primary mt-4">Data Pribadi</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama_lengkap"
                                    value="{{ old('nama_lengkap', $pendaftaran->nama_lengkap) }}" class="form-control"
                                    placeholder="Masukkan nama lengkap" required>
                                @error('nama_lengkap')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">NIK <span class="text-danger">*</span></label>
                                <input type="text" name="nik" value="{{ old('nik', $pendaftaran->nik) }}"
                                    class="form-control" placeholder="Contoh: 3318123020002" required>
                                @error('nik')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">NISN <span class="text-danger">*</span></label>
                                <input type="text" name="nisn" value="{{ old('nisn', $pendaftaran->nisn) }}"
                                    class="form-control" placeholder="Masukkan NISN" required>
                                <small class="form-text text-muted"><a
                                        href="https://nisn.data.kemdikbud.go.id/index.php/Cindex/formcaribynama"
                                        target="_blank">Cek NISN</a></small>
                                @error('nisn')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select name="jkel" class="form-select sel2" data-placeholder="Pilih salah satu"
                                    required>
                                    <option value=""></option>
                                    <option value="L" {{ old('jkel', $pendaftaran->jkel) == 'L' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="P" {{ old('jkel', $pendaftaran->jkel) == 'P' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('jkel')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Tempat Lahir (Kota/Kabupaten) <span
                                        class="text-danger">*</span></label>
                                @php
                                    $kabs = new App\Http\Controllers\DaerahController();
                                    $kabs = $kabs->cities_all();
                                @endphp
                                <select name="tempat_lahir" id="tempat_lahir" class="form-select sel2"
                                    data-placeholder="Ketik untuk mencari..." required>
                                    <option value=""></option>
                                    @foreach ($kabs as $item)
                                        <option value="{{ $item->id ?? '' }}"
                                            {{ old('tempat_lahir', $pendaftaran->tempat_lahir) == $item->id ? 'selected' : '' }}>
                                            {{ $item->name ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tempat_lahir')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir) }}" class="form-control"
                                    required>
                                @error('tanggal_lahir')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Golongan Darah <span
                                        class="text-danger">*</span></label>
                                <select name="gol_darah" class="form-select sel2" data-placeholder="Pilih salah satu"
                                    required>
                                    <option value=""></option>
                                    <option value="-"
                                        {{ old('gol_darah', $pendaftaran->gol_darah) == '-' ? 'selected' : '' }}>-</option>
                                    <option value="A"
                                        {{ old('gol_darah', $pendaftaran->gol_darah) == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B"
                                        {{ old('gol_darah', $pendaftaran->gol_darah) == 'B' ? 'selected' : '' }}>B</option>
                                    <option value="AB"
                                        {{ old('gol_darah', $pendaftaran->gol_darah) == 'AB' ? 'selected' : '' }}>AB
                                    </option>
                                    <option value="O"
                                        {{ old('gol_darah', $pendaftaran->gol_darah) == 'O' ? 'selected' : '' }}>O</option>
                                </select>
                                @error('gol_darah')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">No. HP <span class="text-danger">*</span></label>
                                <input type="text" name="no_hp" value="{{ old('no_hp', $pendaftaran->no_hp) }}"
                                    class="form-control" placeholder="Contoh: 081234567890" required>
                                @error('no_hp')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" value="{{ old('email', $pendaftaran->email) }}"
                                    class="form-control" placeholder="Contoh: siswa@gmail.com" required>
                                @error('email')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Alamat --}}
                        <h5 class="border-bottom pb-2 mb-3 text-primary mt-4">Alamat</h5>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Provinsi <span class="text-danger">*</span></label>
                                @php
                                    $provinces = new App\Http\Controllers\DaerahController();
                                    $provinces = $provinces->provinces();
                                @endphp
                                <select name="provinsi" id="provinsi" class="form-select sel2" required>
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinces as $item)
                                        <option value="{{ $item->id ?? '' }}"
                                            {{ old('provinsi', $pendaftaran->provinsi) == $item->id ? 'selected' : '' }}>
                                            {{ $item->name ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('provinsi')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Kabupaten <span class="text-danger">*</span></label>
                                <select name="kabupaten" id="kabupaten" class="form-select sel2" required>
                                    <option value="">Pilih Kabupaten</option>
                                </select>
                                @error('kabupaten')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Kecamatan <span class="text-danger">*</span></label>
                                <select name="kecamatan" id="kecamatan" class="form-select sel2" required>
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                                @error('kecamatan')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Desa/Kelurahan <span
                                        class="text-danger">*</span></label>
                                <select name="desa" id="desa" class="form-select sel2" required>
                                    <option value="">Pilih Desa</option>
                                </select>
                                @error('desa')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label fw-bold">Dusun</label>
                                <input type="text" name="dusun" value="{{ old('dusun', $pendaftaran->dusun) }}"
                                    class="form-control" placeholder="Contoh: Kajen">
                                @error('dusun')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Alamat <span class="text-danger">*</span></label>
                                <input type="text" name="alamat" value="{{ old('alamat', $pendaftaran->alamat) }}"
                                    class="form-control" placeholder="Contoh: Jalan Mawar No.33" required>
                                @error('alamat')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-1 mb-3">
                                <label class="form-label fw-bold">RT <span class="text-danger">*</span></label>
                                <input type="text" name="rt" value="{{ old('rt', $pendaftaran->rt) }}"
                                    class="form-control" placeholder="01" required>
                                @error('rt')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-1 mb-3">
                                <label class="form-label fw-bold">RW <span class="text-danger">*</span></label>
                                <input type="text" name="rw" value="{{ old('rw', $pendaftaran->rw) }}"
                                    class="form-control" placeholder="01" required>
                                @error('rw')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label fw-bold">Kode POS <span class="text-danger">*</span></label>
                                <input type="text" name="kodepos" value="{{ old('kodepos', $pendaftaran->kodepos) }}"
                                    class="form-control" placeholder="59154" required>
                                <small class="form-text text-muted"><a href="https://kodepos.posindonesia.co.id/"
                                        target="_blank">Cari di sini</a></small>
                                @error('kodepos')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Pendidikan --}}
                        <h5 class="border-bottom pb-2 mb-3 text-primary mt-4">Data Pendidikan</h5>
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label class="form-label fw-bold">Asal Sekolah <span class="text-danger">*</span></label>
                                <input type="text" name="asalsekolah"
                                    value="{{ old('asalsekolah', $pendaftaran->asalsekolah) }}" class="form-control"
                                    placeholder="Contoh: SMP Negeri 1 Kudus" required>
                                @error('asalsekolah')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Rekomendasi <span class="text-danger">*</span></label>
                                <input type="text" name="rekomendasi"
                                    value="{{ old('rekomendasi', $pendaftaran->rekomendasi) }}" class="form-control"
                                    placeholder="Rekomendasi dari" required>
                                @error('rekomendasi')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Data Orang Tua --}}
                        <h5 class="border-bottom pb-2 mb-3 text-primary mt-4">Data Orang Tua</h5>
                        <div class="row">
                            {{-- Ayah --}}
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Nama Ayah <span class="text-danger">*</span></label>
                                <input type="text" name="nama_ayah"
                                    value="{{ old('nama_ayah', $pendaftaran->nama_ayah) }}" class="form-control"
                                    placeholder="Nama lengkap ayah" required>
                                @error('nama_ayah')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Pekerjaan Ayah <span
                                        class="text-danger">*</span></label>
                                <select name="pekerjaan_ayah" class="form-select sel2"
                                    data-placeholder="Pilih salah satu" required>
                                    <option value=""></option>
                                    <option value="PNS"
                                        {{ old('pekerjaan_ayah', $pendaftaran->pekerjaan_ayah) == 'PNS' ? 'selected' : '' }}>
                                        PNS</option>
                                    <option value="TNI/POLRI"
                                        {{ old('pekerjaan_ayah', $pendaftaran->pekerjaan_ayah) == 'TNI/POLRI' ? 'selected' : '' }}>
                                        TNI/POLRI</option>
                                    <option value="Karyawan Swasta"
                                        {{ old('pekerjaan_ayah', $pendaftaran->pekerjaan_ayah) == 'Karyawan Swasta' ? 'selected' : '' }}>
                                        Karyawan Swasta</option>
                                    <option value="Wiraswasta"
                                        {{ old('pekerjaan_ayah', $pendaftaran->pekerjaan_ayah) == 'Wiraswasta' ? 'selected' : '' }}>
                                        Wiraswasta</option>
                                    <option value="Petani"
                                        {{ old('pekerjaan_ayah', $pendaftaran->pekerjaan_ayah) == 'Petani' ? 'selected' : '' }}>
                                        Petani</option>
                                    <option value="Nelayan"
                                        {{ old('pekerjaan_ayah', $pendaftaran->pekerjaan_ayah) == 'Nelayan' ? 'selected' : '' }}>
                                        Nelayan</option>
                                    <option value="Buruh"
                                        {{ old('pekerjaan_ayah', $pendaftaran->pekerjaan_ayah) == 'Buruh' ? 'selected' : '' }}>
                                        Buruh</option>
                                    <option value="Lainnya"
                                        {{ old('pekerjaan_ayah', $pendaftaran->pekerjaan_ayah) == 'Lainnya' ? 'selected' : '' }}>
                                        Lainnya</option>
                                </select>
                                @error('pekerjaan_ayah')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Pendidikan Ayah <span
                                        class="text-danger">*</span></label>
                                <select name="pendidikan_ayah" class="form-select sel2"
                                    data-placeholder="Pilih salah satu" required>
                                    <option value=""></option>
                                    <option value="SD/Sederajat"
                                        {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah) == 'SD/Sederajat' ? 'selected' : '' }}>
                                        SD/Sederajat</option>
                                    <option value="SMP/Sederajat"
                                        {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah) == 'SMP/Sederajat' ? 'selected' : '' }}>
                                        SMP/Sederajat</option>
                                    <option value="SMA/Sederajat"
                                        {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah) == 'SMA/Sederajat' ? 'selected' : '' }}>
                                        SMA/Sederajat</option>
                                    <option value="D1/D2/D3"
                                        {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah) == 'D1/D2/D3' ? 'selected' : '' }}>
                                        D1/D2/D3</option>
                                    <option value="S1/D4"
                                        {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah) == 'S1/D4' ? 'selected' : '' }}>
                                        S1/D4</option>
                                    <option value="S2"
                                        {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah) == 'S2' ? 'selected' : '' }}>
                                        S2</option>
                                    <option value="S3"
                                        {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah) == 'S3' ? 'selected' : '' }}>
                                        S3</option>
                                </select>
                                @error('pendidikan_ayah')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Ibu --}}
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Nama Ibu <span class="text-danger">*</span></label>
                                <input type="text" name="nama_ibu"
                                    value="{{ old('nama_ibu', $pendaftaran->nama_ibu) }}" class="form-control"
                                    placeholder="Nama lengkap ibu" required>
                                @error('nama_ibu')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Pekerjaan Ibu <span class="text-danger">*</span></label>
                                <select name="pekerjaan_ibu" class="form-select sel2" data-placeholder="Pilih salah satu"
                                    required>
                                    <option value=""></option>
                                    <option value="PNS"
                                        {{ old('pekerjaan_ibu', $pendaftaran->pekerjaan_ibu) == 'PNS' ? 'selected' : '' }}>
                                        PNS</option>
                                    <option value="TNI/POLRI"
                                        {{ old('pekerjaan_ibu', $pendaftaran->pekerjaan_ibu) == 'TNI/POLRI' ? 'selected' : '' }}>
                                        TNI/POLRI</option>
                                    <option value="Karyawan Swasta"
                                        {{ old('pekerjaan_ibu', $pendaftaran->pekerjaan_ibu) == 'Karyawan Swasta' ? 'selected' : '' }}>
                                        Karyawan Swasta</option>
                                    <option value="Wiraswasta"
                                        {{ old('pekerjaan_ibu', $pendaftaran->pekerjaan_ibu) == 'Wiraswasta' ? 'selected' : '' }}>
                                        Wiraswasta</option>
                                    <option value="Petani"
                                        {{ old('pekerjaan_ibu', $pendaftaran->pekerjaan_ibu) == 'Petani' ? 'selected' : '' }}>
                                        Petani</option>
                                    <option value="Nelayan"
                                        {{ old('pekerjaan_ibu', $pendaftaran->pekerjaan_ibu) == 'Nelayan' ? 'selected' : '' }}>
                                        Nelayan</option>
                                    <option value="Nelayan"
                                        {{ old('pekerjaan_ibu', $pendaftaran->pekerjaan_ibu) == 'Guru' ? 'selected' : '' }}>
                                        Guru</option>
                                    <option value="Buruh"
                                        {{ old('pekerjaan_ibu', $pendaftaran->pekerjaan_ibu) == 'Buruh' ? 'selected' : '' }}>
                                        Buruh</option>
                                    <option value="Ibu Rumah Tangga"
                                        {{ old('pekerjaan_ibu', $pendaftaran->pekerjaan_ibu) == 'Ibu Rumah Tangga' ? 'selected' : '' }}>
                                        Ibu Rumah Tangga</option>
                                    <option value="Lainnya"
                                        {{ old('pekerjaan_ibu', $pendaftaran->pekerjaan_ibu) == 'Lainnya' ? 'selected' : '' }}>
                                        Lainnya</option>
                                </select>
                                @error('pekerjaan_ibu')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Pendidikan Ibu <span
                                        class="text-danger">*</span></label>
                                <select name="pendidikan_ibu" class="form-select sel2"
                                    data-placeholder="Pilih salah satu" required>
                                    <option value=""></option>
                                    <option value="SD/Sederajat"
                                        {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu) == 'SD/Sederajat' ? 'selected' : '' }}>
                                        SD/Sederajat</option>
                                    <option value="SMP/Sederajat"
                                        {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu) == 'SMP/Sederajat' ? 'selected' : '' }}>
                                        SMP/Sederajat</option>
                                    <option value="SMA/Sederajat"
                                        {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu) == 'SMA/Sederajat' ? 'selected' : '' }}>
                                        SMA/Sederajat</option>
                                    <option value="D1/D2/D3"
                                        {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu) == 'D1/D2/D3' ? 'selected' : '' }}>
                                        D1/D2/D3</option>
                                    <option value="S1/D4"
                                        {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu) == 'S1/D4' ? 'selected' : '' }}>
                                        S1/D4</option>
                                    <option value="S2"
                                        {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu) == 'S2' ? 'selected' : '' }}>
                                        S2</option>
                                    <option value="S3"
                                        {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu) == 'S3' ? 'selected' : '' }}>
                                        S3</option>
                                </select>
                                @error('pendidikan_ibu')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Wali --}}
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Nama Wali</label>
                                <input type="text" name="nama_wali"
                                    value="{{ old('nama_wali', $pendaftaran->nama_wali) }}" class="form-control"
                                    placeholder="Nama wali (jika ada)">
                                @error('nama_wali')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Pekerjaan Wali</label>
                                <select name="pekerjaan_wali" class="form-select sel2"
                                    data-placeholder="Pilih salah satu">
                                    <option value=""></option>
                                    <option value="PNS"
                                        {{ old('pekerjaan_wali', $pendaftaran->pekerjaan_wali) == 'PNS' ? 'selected' : '' }}>
                                        PNS</option>
                                    <option value="TNI/POLRI"
                                        {{ old('pekerjaan_wali', $pendaftaran->pekerjaan_wali) == 'TNI/POLRI' ? 'selected' : '' }}>
                                        TNI/POLRI</option>
                                    <option value="Karyawan Swasta"
                                        {{ old('pekerjaan_wali', $pendaftaran->pekerjaan_wali) == 'Karyawan Swasta' ? 'selected' : '' }}>
                                        Karyawan Swasta</option>
                                    <option value="Wiraswasta"
                                        {{ old('pekerjaan_wali', $pendaftaran->pekerjaan_wali) == 'Wiraswasta' ? 'selected' : '' }}>
                                        Wiraswasta</option>
                                    <option value="Petani"
                                        {{ old('pekerjaan_wali', $pendaftaran->pekerjaan_wali) == 'Petani' ? 'selected' : '' }}>
                                        Petani</option>
                                    <option value="Nelayan"
                                        {{ old('pekerjaan_wali', $pendaftaran->pekerjaan_wali) == 'Nelayan' ? 'selected' : '' }}>
                                        Nelayan</option>
                                    <option value="Buruh"
                                        {{ old('pekerjaan_wali', $pendaftaran->pekerjaan_wali) == 'Buruh' ? 'selected' : '' }}>
                                        Buruh</option>
                                    <option value="Lainnya"
                                        {{ old('pekerjaan_wali', $pendaftaran->pekerjaan_wali) == 'Lainnya' ? 'selected' : '' }}>
                                        Lainnya</option>
                                </select>
                                @error('pekerjaan_wali')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Pendidikan Wali</label>
                                <select name="pendidikan_wali" class="form-select sel2"
                                    data-placeholder="Pilih salah satu">
                                    <option value=""></option>
                                    <option value="SD/Sederajat"
                                        {{ old('pendidikan_wali', $pendaftaran->pendidikan_wali) == 'SD/Sederajat' ? 'selected' : '' }}>
                                        SD/Sederajat</option>
                                    <option value="SMP/Sederajat"
                                        {{ old('pendidikan_wali', $pendaftaran->pendidikan_wali) == 'SMP/Sederajat' ? 'selected' : '' }}>
                                        SMP/Sederajat</option>
                                    <option value="SMA/Sederajat"
                                        {{ old('pendidikan_wali', $pendaftaran->pendidikan_wali) == 'SMA/Sederajat' ? 'selected' : '' }}>
                                        SMA/Sederajat</option>
                                    <option value="D1/D2/D3"
                                        {{ old('pendidikan_wali', $pendaftaran->pendidikan_wali) == 'D1/D2/D3' ? 'selected' : '' }}>
                                        D1/D2/D3</option>
                                    <option value="S1/D4"
                                        {{ old('pendidikan_wali', $pendaftaran->pendidikan_wali) == 'S1/D4' ? 'selected' : '' }}>
                                        S1/D4</option>
                                    <option value="S2"
                                        {{ old('pendidikan_wali', $pendaftaran->pendidikan_wali) == 'S2' ? 'selected' : '' }}>
                                        S2</option>
                                    <option value="S3"
                                        {{ old('pendidikan_wali', $pendaftaran->pendidikan_wali) == 'S3' ? 'selected' : '' }}>
                                        S3</option>
                                </select>
                                @error('pendidikan_wali')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Telp Wali</label>
                                <input type="text" name="telp_wali"
                                    value="{{ old('telp_wali', $pendaftaran->telp_wali) }}" class="form-control"
                                    placeholder="No. telp wali">
                                @error('telp_wali')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Upload Dokumen --}}
                        <h5 class="border-bottom pb-2 mb-3 text-primary mt-4">Dokumen Pendukung</h5>
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle"></i> Kosongkan field jika tidak ingin mengubah file. Format: JPG,
                            PNG, JPEG. Maksimal: 1MB per file
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Foto</label>
                                <input type="file" name="foto" class="form-control" accept="image/*">
                                @if ($pendaftaran->foto)
                                    <small class="text-muted d-block mt-1">File saat ini: <a
                                            href="{{ asset('storage/' . $pendaftaran->foto) }}"
                                            target="_blank">{{ basename($pendaftaran->foto) }}</a></small>
                                @endif
                                @error('foto')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Kartu Keluarga</label>
                                <input type="file" name="kk" class="form-control" accept="image/*">
                                @if ($pendaftaran->kk)
                                    <small class="text-muted d-block mt-1">File saat ini: <a
                                            href="{{ asset('storage/' . $pendaftaran->kk) }}"
                                            target="_blank">{{ basename($pendaftaran->kk) }}</a></small>
                                @endif
                                @error('kk')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">KTP Orang Tua</label>
                                <input type="file" name="ktp_ortu" class="form-control" accept="image/*">
                                @if ($pendaftaran->ktp_ortu)
                                    <small class="text-muted d-block mt-1">File saat ini: <a
                                            href="{{ asset('storage/' . $pendaftaran->ktp_ortu) }}"
                                            target="_blank">{{ basename($pendaftaran->ktp_ortu) }}</a></small>
                                @endif
                                @error('ktp_ortu')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Akta Lahir</label>
                                <input type="file" name="aktalahir" class="form-control" accept="image/*">
                                @if ($pendaftaran->aktalahir)
                                    <small class="text-muted d-block mt-1">File saat ini: <a
                                            href="{{ asset('storage/' . $pendaftaran->aktalahir) }}"
                                            target="_blank">{{ basename($pendaftaran->aktalahir) }}</a></small>
                                @endif
                                @error('aktalahir')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">KIP (Opsional)</label>
                                <input type="file" name="kip" class="form-control" accept="image/*">
                                @if ($pendaftaran->kip)
                                    <small class="text-muted d-block mt-1">File saat ini: <a
                                            href="{{ asset('storage/' . $pendaftaran->kip) }}"
                                            target="_blank">{{ basename($pendaftaran->kip) }}</a></small>
                                @endif
                                @error('kip')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">PKH (Opsional)</label>
                                <input type="file" name="pkh" class="form-control" accept="image/*">
                                @if ($pendaftaran->pkh)
                                    <small class="text-muted d-block mt-1">File saat ini: <a
                                            href="{{ asset('storage/' . $pendaftaran->pkh) }}"
                                            target="_blank">{{ basename($pendaftaran->pkh) }}</a></small>
                                @endif
                                @error('pkh')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">KKS (Opsional)</label>
                                <input type="file" name="kks" class="form-control" accept="image/*">
                                @if ($pendaftaran->kks)
                                    <small class="text-muted d-block mt-1">File saat ini: <a
                                            href="{{ asset('storage/' . $pendaftaran->kks) }}"
                                            target="_blank">{{ basename($pendaftaran->kks) }}</a></small>
                                @endif
                                @error('kks')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Update Data
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    <!--end::Row-->
@endsection

@push('script')
<!-- Include Select2 CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        // Inisialisasi Select2
        $('.sel2').select2({
            theme: 'bootstrap-5',
            width: '100%',
            placeholder: function() {
                return $(this).data('placeholder') || 'Pilih';
            }
        });

        // --- FUNSI PENTING: Cari ID berdasarkan Nama ---
        function getIdFromName(selectId, name) {
            if (!name) return null;
            var $selectedOption = $('#' + selectId + ' option').filter(function() {
                return $(this).text().trim() === name.trim();
            });
            if ($selectedOption.length > 0) {
                return $selectedOption.val();
            }
            return null;
        }

        // --- AMBIL NAMA DARI DATABASE ---
        var provName = "{{ $pendaftaran->provinsi }}";
        var kabName = "{{ $pendaftaran->kabupaten }}";
        var kecName = "{{ $pendaftaran->kecamatan }}";
        var desaName = "{{ $pendaftaran->desa }}";
        console.log("Initial Names from DB:", { provName, kabName, kecName, desaName });

        // --- MULAI PROSES PENGISIAN DATA AWAL ---
        var provId = getIdFromName('provinsi', provName);
        console.log("Found Province ID:", provId, "for name:", provName);

        if (provId) {
            $('#provinsi').val(provId).trigger('change.select2');

            // 2. Load Kabupaten, lalu cari ID dari nama
            $.ajax({
                url: '{{ route('cities') }}',
                data: { id: provId }
            }).then(function(data) {
                console.log("AJAX Success: Data for Kabupaten received:", data);
                $('#kabupaten').empty().append('<option value="">Pilih Kabupaten</option>');
                $.each(data, function(key, value) {
                    $('#kabupaten').append('<option value="' + key + '">' + value + '</option>');
                });

                var kabId = getIdFromName('kabupaten', kabName);
                console.log("Found Kabupaten ID:", kabId, "for name:", kabName);

                if (kabId) {
                    $('#kabupaten').val(kabId).trigger('change.select2');

                    // 3. Load Kecamatan, lalu cari ID dari nama
                    $.ajax({
                        url: '{{ route('districts') }}',
                        data: { id: kabId }
                    }).then(function(data) {
                        console.log("AJAX Success: Data for Kecamatan received:", data);
                        $('#kecamatan').empty().append('<option value="">Pilih Kecamatan</option>');
                        $.each(data, function(key, value) {
                            $('#kecamatan').append('<option value="' + key + '">' + value + '</option>');
                        });

                        var kecId = getIdFromName('kecamatan', kecName);
                        console.log("Found Kecamatan ID:", kecId, "for name:", kecName);

                        if (kecId) {
                            $('#kecamatan').val(kecId).trigger('change.select2');

                            // 4. Load Desa, lalu cari ID dari nama
                            $.ajax({
                                url: '{{ route('villages') }}',
                                data: { id: kecId }
                            }).then(function(data) {
                                console.log("AJAX Success: Data for Desa received:", data);
                                $('#desa').empty().append('<option value="">Pilih Desa</option>');
                                $.each(data, function(key, value) {
                                    $('#desa').append('<option value="' + key + '">' + value + '</option>');
                                });

                                var desaId = getIdFromName('desa', desaName);
                                console.log("Found Desa ID:", desaId, "for name:", desaName);

                                if (desaId) {
                                    $('#desa').val(desaId).trigger('change.select2');
                                }
                            });
                        }
                    });
                }
            });
        }

        // Fungsi AJAX untuk dropdown daerah (saat user mengubah pilihan)
        function onChangeSelect(url, id, name) {
            $.ajax({
                url: url,
                type: 'GET',
                data: { id: id },
                success: function(data) {
                    $('#' + name).empty().append('<option value="">Pilih Salah Satu</option>');
                    $.each(data, function(key, value) {
                        $('#' + name).append('<option value="' + key + '">' + value + '</option>');
                    });
                    $('#' + name).trigger('change.select2');
                }
            });
        }

        // Event listener untuk perubahan user
        $('#provinsi').on('change', function() {
            onChangeSelect('{{ route('cities') }}', $(this).val(), 'kabupaten');
        });
        $('#kabupaten').on('change', function() {
            onChangeSelect('{{ route('districts') }}', $(this).val(), 'kecamatan');
        });
        $('#kecamatan').on('change', function() {
            onChangeSelect('{{ route('villages') }}', $(this).val(), 'desa');
        });

        // Styling untuk status dropdown
        $('#status').on('change', function() {
            var status = $(this).val();
            $(this).removeClass('bg-success bg-warning bg-danger text-white');
            if (status === 'diterima') $(this).addClass('bg-success text-white');
            else if (status === 'diproses') $(this).addClass('bg-warning text-white');
            else if (status === 'ditolak') $(this).addClass('bg-danger text-white');
        }).trigger('change');

        // Konfirmasi sebelum submit
        $('form').on('submit', function(e) {
            e.preventDefault();
            const form = this;
            Swal.fire({
                title: 'Update Data Pendaftar?',
                text: 'Pastikan semua data sudah benar',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#0d6efd',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Update!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endpush
