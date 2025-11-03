@extends('user.layout')

@section('title', 'Formulir Pendaftaran - SPMB SMK Cordova')

@push('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">

    <style>
        .heading {
            width: 100%;
            margin: 10px 0;
            text-align: center;
            line-height: 100%;
        }

        .heading span {
            float: left;
            margin: 20px 0 -10px;
            border: 1px solid #aaa;
            width: 100%;
        }

        .heading h3 {
            text-transform: uppercase;
            display: inline;
            background-color: #fff;
            padding: 0 20px;
            font-size: 12pt;
            color: #1E40AF;
        }

        @keyframes fadeOut {
            100% {
                opacity: 0;
                visibility: hidden;
            }
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .card-header {
            background-color: #1E40AF !important;
        }

        .btn-success {
            background-color: #1E40AF;
            border-color: #1E40AF;
        }

        .btn-success:hover {
            background-color: #1e3a8a;
            border-color: #1e3a8a;
        }

        .required:after {
            content: " *";
            color: red;
        }
    </style>
@endpush

@section('main')

    <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card mb-4">
            <div class="card-header bg-success bg-gradient text-white">
                <h5 class="pt-2 text-center">FORMULIR PENDAFTARAN</h5>
            </div>
            <div class="card-body">

                <!-- PILIHAN GELombang & JURUSAN -->
                <div class="row">
                    <div class="heading"><span></span>
                        <h3>Pilihan Gelombang dan Jurusan</h3>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="mb-2 small fw-bold required">Gelombang</label>
                        <select name="gelombang_id" id="gelombang" class="form-select form-select-sm sel2"
                            data-placeholder="Pilih gelombang" required>
                            <option value=""></option>
                            @foreach ($gelombangs ?? [] as $gelombang)
                                <option value="{{ $gelombang->id }}">{{ $gelombang->nama }}</option>
                            @endforeach
                        </select>
                        @error('gelombang_id')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="mb-2 small fw-bold required">Jurusan</label>
                        <select name="jurusan" id="jurusan" class="form-select form-select-sm sel2"
                            data-placeholder="Pilih jurusan" required>
                            <option value=""></option>
                            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                            <option value="Multimedia">Multimedia</option>
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Administrasi Perkantoran">Administrasi Perkantoran</option>
                        </select>
                        @error('jurusan')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- IDENTITAS -->
                <div class="row">
                    <div class="heading"><span></span>
                        <h3>Identitas Calon Peserta Didik</h3>
                    </div>

                    <div class="col-md-4 mb-4">
                        <label class="mb-2 small fw-bold required">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                            placeholder="Masukkan Nama Lengkap" class="form-control form-control-sm rounded-0" required>
                        @error('nama_lengkap')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label class="mb-2 small fw-bold required">No. HP</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" placeholder="Contoh: 081123456"
                            class="form-control form-control-sm" required>
                        @error('no_hp')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label class="mb-2 small fw-bold required">Email Pribadi</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            placeholder="Contoh: siswa@gmail.com" class="form-control form-control-sm" required>
                        @error('email')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label class="mb-2 small fw-bold required">Jenis Kelamin</label>
                        <select name="jkel" class="form-select form-select-sm sel2" data-placeholder="Pilih salah satu"
                            required>
                            <option value=""></option>
                            <option value="L" {{ old('jkel') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jkel') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jkel')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label class="mb-2 small fw-bold">Golongan Darah</label>
                        <select name="gol_darah" class="form-select form-select-sm sel2"
                            data-placeholder="Pilih salah satu">
                            <option value=""></option>
                            <option value="-" {{ old('gol_darah') == '-' ? 'selected' : '' }}>-</option>
                            <option value="A" {{ old('gol_darah') == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ old('gol_darah') == 'B' ? 'selected' : '' }}>B</option>
                            <option value="AB" {{ old('gol_darah') == 'AB' ? 'selected' : '' }}>AB</option>
                            <option value="O" {{ old('gol_darah') == 'O' ? 'selected' : '' }}>O</option>
                        </select>
                        @error('gol_darah')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label class="mb-2 small fw-bold required">NIK</label>
                        <input type="text" name="nik" value="{{ old('nik') }}"
                            placeholder="Contoh: 3318123020002" class="form-control form-control-sm rounded-0" required>
                        @error('nik')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label class="mb-2 small fw-bold required">Tempat Lahir (Kota/Kabupaten)</label>
                        @php
                            $kabs = new App\Http\Controllers\DaerahController();
                            $kabs = $kabs->cities_all();
                        @endphp
                        <select name="tempat_lahir" id="tempat_lahir" class="form-select form-select-sm sel2"
                            data-placeholder="Ketik untuk mencari kota..." required>
                            <option value="">Ketik untuk mencari...</option>
                            @foreach ($kabs as $item)
                                <option value="{{ $item->id ?? '' }}"
                                    {{ old('tempat_lahir') == $item->id ? 'selected' : '' }}>
                                    {{ $item->name ?? '' }}</option>
                            @endforeach
                        </select>
                        @error('tempat_lahir')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label class="mb-2 small fw-bold required">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                            class="form-control form-control-sm rounded-0" required>
                        @error('tanggal_lahir')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- ALAMAT -->
                <div class="row">
                    <div class="heading"><span></span>
                        <h3>Alamat</h3>
                    </div>

                    <div class="col-md-3 mb-4">
                        <label class="mb-2 small fw-bold required">Provinsi</label>
                        @php
                            $provinces = new App\Http\Controllers\DaerahController();
                            $provinces = $provinces->provinces();
                        @endphp
                        <select name="provinsi" id="provinsi" class="form-select form-select-sm sel2" required>
                            <option value="">Pilih Provinsi</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}"
                                    {{ old('provinsi') == $province->id ? 'selected' : '' }}>
                                    {{ $province->name }}</option>
                            @endforeach
                        </select>
                        @error('provinsi')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-4">
                        <label class="mb-2 small fw-bold required">Kabupaten</label>
                        @php
                            $provinces = new App\Http\Controllers\DaerahController();
                            $cities = $provinces->cities_all();
                        @endphp

                        <select name="kabupaten" id="kabupaten" class="form-select form-select-sm sel2" required>
                            <option value="">Pilih Kabupaten</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}"
                                    {{ old('kabupaten') == $city->id ? 'selected' : '' }}>
                                    {{ $city->name }}</option>
                            @endforeach
                        </select>
                        @error('kabupaten')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-4">
                        <label class="mb-2 small fw-bold required">Kecamatan</label>
                        @php
                            $provinces = new App\Http\Controllers\DaerahController();
                            $districts = $provinces->districts_all();
                        @endphp
                        <select name="kecamatan" id="kecamatan" class="form-select form-select-sm sel2" required>
                            <option value="">Pilih Kecamatan</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}"
                                    {{ old('kecamatan') == $district->id ? 'selected' : '' }}>
                                    {{ $district->name }}</option>
                            @endforeach
                        </select>
                        @error('kecamatan')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-4">
                        <label class="mb-2 small fw-bold required">Desa/Kelurahan</label>
                        @php
                            $provinces = new App\Http\Controllers\HelperController();
                            $villages = $provinces->villages_all();
                        @endphp
                        <select name="desa" id="desa" class="form-select form-select-sm sel2" required>
                            <option value="">Pilih Desa</option>
                            @foreach ($villages as $village)
                                <option value="{{ $village->id }}" {{ old('desa') == $village->id ? 'selected' : '' }}>
                                    {{ $village->name }}</option>
                            @endforeach
                        </select>
                        @error('desa')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-4">
                        <label class="mb-2 small fw-bold">Dusun</label>
                        <input type="text" name="dusun" value="{{ old('dusun') }}" placeholder="Contoh: Kajen"
                            class="form-control form-control-sm">
                        @error('dusun')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="mb-2 small fw-bold required">Alamat</label>
                        <input type="text" name="alamat" value="{{ old('alamat') }}"
                            placeholder="Contoh: Jalan Mawar No.33" class="form-control form-control-sm" required>
                        @error('alamat')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-1 mb-4">
                        <label class="mb-2 small fw-bold required">RT</label>
                        <input type="text" name="rt" value="{{ old('rt') }}" placeholder="01"
                            class="form-control form-control-sm" required>
                        @error('rt')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-1 mb-4">
                        <label class="mb-2 small fw-bold required">RW</label>
                        <input type="text" name="rw" value="{{ old('rw') }}" placeholder="01"
                            class="form-control form-control-sm" required>
                        @error('rw')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-1 mb-4">
                        <label class="mb-2 small fw-bold">Kode POS</label>
                        <input type="text" name="kodepos" value="{{ old('kodepos') }}" placeholder="59154"
                            class="form-control form-control-sm">
                        <small class="form-text text-muted"><a href="https://kodepos.posindonesia.co.id/"
                                target="_blank">Cari di sini</a></small>
                        @error('kodepos')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- PENDIDIKAN -->
                <div class="row">
                    <div class="heading"><span></span>
                        <h3>Pendidikan</h3>
                    </div>

                    <div class="col-md-4 mb-4">
                        <label class="mb-2 small fw-bold required">Nama Sekolah Asal</label>
                        <input type="text" name="asalsekolah" value="{{ old('asalsekolah') }}"
                            placeholder="Contoh: SMP Indonesia" class="form-control form-control-sm rounded-0" required>
                        @error('asalsekolah')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label class="mb-2 small fw-bold required">NISN</label>
                        <input type="text" name="nisn" value="{{ old('nisn') }}" placeholder="Masukkan NISN"
                            class="form-control form-control-sm rounded-0" required>
                        <small class="form-text text-muted"><a
                                href="https://nisn.data.kemdikbud.go.id/index.php/Cindex/formcaribynama"
                                target="_blank">Cek NISN</a></small>
                        @error('nisn')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label class="mb-2 small fw-bold required">Rekomendasi</label>
                        <select name="rekomendasi" class="form-select form-select-sm sel2"
                            data-placeholder="Pilih salah satu" required>
                            <option value=""></option>
                            <option value="Orang Tua" {{ old('rekomendasi') == 'Orang Tua' ? 'selected' : '' }}>Orang Tua
                            </option>
                            <option value="Sekolah" {{ old('rekomendasi') == 'Sekolah' ? 'selected' : '' }}>Sekolah
                            </option>
                            <option value="Teman" {{ old('rekomendasi') == 'Teman' ? 'selected' : '' }}>Teman</option>
                            <option value="Media Sosial" {{ old('rekomendasi') == 'Media Sosial' ? 'selected' : '' }}>
                                Media Sosial</option>
                            <option value="Lainnya" {{ old('rekomendasi') == 'Lainnya' ? 'selected' : '' }}>Lainnya
                            </option>
                        </select>
                        @error('rekomendasi')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- KELUARGA -->
                <div class="row">
                    <div class="heading"><span></span>
                        <h3>Keluarga</h3>
                    </div>

                    <!-- Ayah -->
                    <div class="col-md-4 mb-4">
                        <label class="mb-2 small fw-bold required">Nama Ayah</label>
                        <input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}"
                            placeholder="Masukkan Nama Ayah" class="form-control form-control-sm rounded-0" required>
                        @error('nama_ayah')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="mb-2 small fw-bold required">Pekerjaan Ayah</label>
                        <select name="pekerjaan_ayah" class="form-select form-select-sm sel2"
                            data-placeholder="Pilih salah satu" required>
                            <option value=""></option>
                            <option value="PNS" {{ old('pekerjaan_ayah') == 'PNS' ? 'selected' : '' }}>PNS</option>
                            <option value="TNI/POLRI" {{ old('pekerjaan_ayah') == 'TNI/POLRI' ? 'selected' : '' }}>
                                TNI/POLRI</option>
                            <option value="Karyawan Swasta"
                                {{ old('pekerjaan_ayah') == 'Karyawan Swasta' ? 'selected' : '' }}>Karyawan Swasta</option>
                            <option value="Wiraswasta" {{ old('pekerjaan_ayah') == 'Wiraswasta' ? 'selected' : '' }}>
                                Wiraswasta</option>
                            <option value="Petani" {{ old('pekerjaan_ayah') == 'Petani' ? 'selected' : '' }}>Petani
                            </option>
                            <option value="Nelayan" {{ old('pekerjaan_ayah') == 'Nelayan' ? 'selected' : '' }}>Nelayan
                            </option>
                            <option value="Buruh" {{ old('pekerjaan_ayah') == 'Buruh' ? 'selected' : '' }}>Buruh</option>
                            <option value="Lainnya" {{ old('pekerjaan_ayah') == 'Lainnya' ? 'selected' : '' }}>Lainnya
                            </option>
                        </select>
                        @error('pekerjaan_ayah')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="mb-2 small fw-bold required">Pendidikan Ayah</label>
                        <select name="pendidikan_ayah" class="form-select form-select-sm sel2"
                            data-placeholder="Pilih salah satu" required>
                            <option value=""></option>
                            <option value="SD/Sederajat" {{ old('pendidikan_ayah') == 'SD/Sederajat' ? 'selected' : '' }}>
                                SD/Sederajat</option>
                            <option value="SMP/Sederajat"
                                {{ old('pendidikan_ayah') == 'SMP/Sederajat' ? 'selected' : '' }}>SMP/Sederajat</option>
                            <option value="SMA/Sederajat"
                                {{ old('pendidikan_ayah') == 'SMA/Sederajat' ? 'selected' : '' }}>SMA/Sederajat</option>
                            <option value="D1/D2/D3" {{ old('pendidikan_ayah') == 'D1/D2/D3' ? 'selected' : '' }}>D1/D2/D3
                            </option>
                            <option value="S1/D4" {{ old('pendidikan_ayah') == 'S1/D4' ? 'selected' : '' }}>S1/D4
                            </option>
                            <option value="S2" {{ old('pendidikan_ayah') == 'S2' ? 'selected' : '' }}>S2</option>
                            <option value="S3" {{ old('pendidikan_ayah') == 'S3' ? 'selected' : '' }}>S3</option>
                        </select>
                        @error('pendidikan_ayah')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Ibu -->
                    <div class="col-md-4 mb-4">
                        <label class="mb-2 small fw-bold required">Nama Ibu</label>
                        <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}"
                            placeholder="Masukkan Nama Ibu" class="form-control form-control-sm rounded-0" required>
                        @error('nama_ibu')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="mb-2 small fw-bold required">Pekerjaan Ibu</label>
                        <select name="pekerjaan_ibu" class="form-select form-select-sm sel2"
                            data-placeholder="Pilih salah satu" required>
                            <option value=""></option>
                            <option value="PNS" {{ old('pekerjaan_ibu') == 'PNS' ? 'selected' : '' }}>PNS</option>
                            <option value="TNI/POLRI" {{ old('pekerjaan_ibu') == 'TNI/POLRI' ? 'selected' : '' }}>
                                TNI/POLRI</option>
                            <option value="Karyawan Swasta"
                                {{ old('pekerjaan_ibu') == 'Karyawan Swasta' ? 'selected' : '' }}>Karyawan Swasta</option>
                            <option value="Wiraswasta" {{ old('pekerjaan_ibu') == 'Wiraswasta' ? 'selected' : '' }}>
                                Wiraswasta</option>
                            <option value="Petani" {{ old('pekerjaan_ibu') == 'Petani' ? 'selected' : '' }}>Petani
                            </option>
                            <option value="Nelayan" {{ old('pekerjaan_ibu') == 'Nelayan' ? 'selected' : '' }}>Nelayan
                            </option>
                            <option value="Buruh" {{ old('pekerjaan_ibu') == 'Buruh' ? 'selected' : '' }}>Buruh</option>
                            <option value="Ibu Rumah Tangga"
                                {{ old('pekerjaan_ibu') == 'Ibu Rumah Tangga' ? 'selected' : '' }}>Ibu Rumah Tangga
                            </option>
                            <option value="Lainnya" {{ old('pekerjaan_ibu') == 'Lainnya' ? 'selected' : '' }}>Lainnya
                            </option>
                        </select>
                        @error('pekerjaan_ibu')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label class="mb-2 small fw-bold required">Pendidikan Ibu</label>
                        <select name="pendidikan_ibu" class="form-select form-select-sm sel2"
                            data-placeholder="Pilih salah satu" required>
                            <option value=""></option>
                            <option value="SD/Sederajat" {{ old('pendidikan_ibu') == 'SD/Sederajat' ? 'selected' : '' }}>
                                SD/Sederajat</option>
                            <option value="SMP/Sederajat"
                                {{ old('pendidikan_ibu') == 'SMP/Sederajat' ? 'selected' : '' }}>SMP/Sederajat</option>
                            <option value="SMA/Sederajat"
                                {{ old('pendidikan_ibu') == 'SMA/Sederajat' ? 'selected' : '' }}>SMA/Sederajat</option>
                            <option value="D1/D2/D3" {{ old('pendidikan_ibu') == 'D1/D2/D3' ? 'selected' : '' }}>D1/D2/D3
                            </option>
                            <option value="S1/D4" {{ old('pendidikan_ibu') == 'S1/D4' ? 'selected' : '' }}>S1/D4
                            </option>
                            <option value="S2" {{ old('pendidikan_ibu') == 'S2' ? 'selected' : '' }}>S2</option>
                            <option value="S3" {{ old('pendidikan_ibu') == 'S3' ? 'selected' : '' }}>S3</option>
                        </select>
                        @error('pendidikan_ibu')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Wali -->
                    <div class="col-md-3 mb-4">
                        <label class="mb-2 small fw-bold">Nama Wali</label>
                        <input type="text" name="nama_wali" value="{{ old('nama_wali') }}"
                            placeholder="Masukkan Nama Wali" class="form-control form-control-sm rounded-0">
                        @error('nama_wali')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-4">
                        <label class="mb-2 small fw-bold">Pekerjaan Wali</label>
                        <select name="pekerjaan_wali" class="form-select form-select-sm sel2"
                            data-placeholder="Pilih salah satu">
                            <option value=""></option>
                            <option value="PNS" {{ old('pekerjaan_wali') == 'PNS' ? 'selected' : '' }}>PNS</option>
                            <option value="TNI/POLRI" {{ old('pekerjaan_wali') == 'TNI/POLRI' ? 'selected' : '' }}>
                                TNI/POLRI</option>
                            <option value="Karyawan Swasta"
                                {{ old('pekerjaan_wali') == 'Karyawan Swasta' ? 'selected' : '' }}>Karyawan Swasta
                            </option>
                            <option value="Wiraswasta" {{ old('pekerjaan_wali') == 'Wiraswasta' ? 'selected' : '' }}>
                                Wiraswasta</option>
                            <option value="Petani" {{ old('pekerjaan_wali') == 'Petani' ? 'selected' : '' }}>Petani
                            </option>
                            <option value="Nelayan" {{ old('pekerjaan_wali') == 'Nelayan' ? 'selected' : '' }}>Nelayan
                            </option>
                            <option value="Buruh" {{ old('pekerjaan_wali') == 'Buruh' ? 'selected' : '' }}>Buruh
                            </option>
                            <option value="Lainnya" {{ old('pekerjaan_wali') == 'Lainnya' ? 'selected' : '' }}>Lainnya
                            </option>
                        </select>
                        @error('pekerjaan_wali')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-4">
                        <label class="mb-2 small fw-bold">Pendidikan Wali</label>
                        <select name="pendidikan_wali" class="form-select form-select-sm sel2"
                            data-placeholder="Pilih salah satu">
                            <option value=""></option>
                            <option value="SD/Sederajat"
                                {{ old('pendidikan_wali') == 'SD/Sederajat' ? 'selected' : '' }}>
                                SD/Sederajat</option>
                            <option value="SMP/Sederajat"
                                {{ old('pendidikan_wali') == 'SMP/Sederajat' ? 'selected' : '' }}>SMP/Sederajat</option>
                            <option value="SMA/Sederajat"
                                {{ old('pendidikan_wali') == 'SMA/Sederajat' ? 'selected' : '' }}>SMA/Sederajat</option>
                            <option value="D1/D2/D3" {{ old('pendidikan_wali') == 'D1/D2/D3' ? 'selected' : '' }}>
                                D1/D2/D3</option>
                            <option value="S1/D4" {{ old('pendidikan_wali') == 'S1/D4' ? 'selected' : '' }}>S1/D4
                            </option>
                            <option value="S2" {{ old('pendidikan_wali') == 'S2' ? 'selected' : '' }}>S2</option>
                            <option value="S3" {{ old('pendidikan_wali') == 'S3' ? 'selected' : '' }}>S3</option>
                        </select>
                        @error('pendidikan_wali')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-4">
                        <label class="mb-2 small fw-bold">Telp Wali</label>
                        <input type="text" name="telp_wali" value="{{ old('telp_wali') }}"
                            placeholder="Masukkan No Telp Wali" class="form-control form-control-sm rounded-0">
                        @error('telp_wali')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- UNGGAH BERKAS -->
                <div class="row">
                    <div class="heading"><span></span>
                        <h3>Unggah Berkas (Maks. 1MB per file)</h3>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="mb-2 small fw-bold required">Foto</label>
                        <input type="file" name="foto" class="form-control form-control-sm rounded-0"
                            accept="image/*" required>
                        <small class="form-text text-muted">Format: JPG, PNG, JPEG. Maksimal: 1MB</small>
                        @error('foto')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="mb-2 small fw-bold required">Kartu Keluarga</label>
                        <input type="file" name="kk" class="form-control form-control-sm rounded-0"
                            accept="image/*" required>
                        <small class="form-text text-muted">Format: JPG, PNG, JPEG. Maksimal: 1MB</small>
                        @error('kk')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="mb-2 small fw-bold required">KTP Orang Tua</label>
                        <input type="file" name="ktp_ortu" class="form-control form-control-sm rounded-0"
                            accept="image/*" required>
                        <small class="form-text text-muted">Format: JPG, PNG, JPEG. Maksimal: 1MB</small>
                        @error('ktp_ortu')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="mb-2 small fw-bold required">Akta Kelahiran</label>
                        <input type="file" name="aktalahir" class="form-control form-control-sm rounded-0"
                            accept="image/*" required>
                        <small class="form-text text-muted">Format: JPG, PNG, JPEG. Maksimal: 1MB</small>
                        @error('aktalahir')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="mb-2 small fw-bold">KIP</label>
                        <input type="file" name="kip" class="form-control form-control-sm rounded-0"
                            accept="image/*">
                        <small class="form-text text-muted">Format: JPG, PNG, JPEG. Maksimal: 1MB</small>
                        @error('kip')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="mb-2 small fw-bold">PKH</label>
                        <input type="file" name="pkh" class="form-control form-control-sm rounded-0"
                            accept="image/*">
                        <small class="form-text text-muted">Format: JPG, PNG, JPEG. Maksimal: 1MB</small>
                        @error('pkh')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="mb-2 small fw-bold">KKS</label>
                        <input type="file" name="kks" class="form-control form-control-sm rounded-0"
                            accept="image/*">
                        <small class="form-text text-muted">Format: JPG, PNG, JPEG. Maksimal: 1MB</small>
                        @error('kks')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-success bg-gradient">Kirim Pendaftaran</button>
            </div>
        </div>
    </form>
@endsection


@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('.sel2').select2({
                theme: 'bootstrap-5',
                width: '100%',
                placeholder: function() { return $(this).data('placeholder') || 'Pilih'; }
            });

            // gunakan id yang sesuai dengan HTML: provinsi, kabupaten, kecamatan, desa
            $('#provinsi').on('change', function() {
                onChangeSelect('{{ route('cities') }}', $(this).val(), '#kabupaten');
            });

            $('#kabupaten').on('change', function() {
                onChangeSelect('{{ route('districts') }}', $(this).val(), '#kecamatan');
            });

            $('#kecamatan').on('change', function() {
                onChangeSelect('{{ route('villages') }}', $(this).val(), '#desa');
            });

            function onChangeSelect(url, id, targetSelector) {
                $(targetSelector).empty().append('<option value="">Loading...</option>');
                $.get(url, { id: id })
                    .done(function(data) {
                        $(targetSelector).empty().append('<option value="">Pilih</option>');
                        data.forEach(function(item) {
                            $(targetSelector).append(`<option value="${item.id}">${item.name}</option>`);
                        });
                        $(targetSelector).trigger('change.select2');
                    })
                    .fail(function() {
                        $(targetSelector).empty().append('<option value="">Gagal memuat</option>');
                    });
            }
        });

        window.addEventListener('load', function() {
            var pl = document.querySelector('.pre-loader');
            if (pl) pl.classList.add('hidden');
        });
    </script>
@endpush
