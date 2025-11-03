@extends('user.layout')

@section('title', 'Daftar - SPMB SMK Cordova')

@section('main')
    <h2>Form Pendaftaran</h2>
    <p>Silakan isi data diri untuk mendaftar.</p>
@endsection


{{-- ini contoh filed untuk saya masukan ke prompt nanti  --}}
{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="title" content="Penerimaan Peserta Didik Baru Yayasan Salafiyah Kajen Pati">
    <meta name="description" content="Penerimaan Peserta Didik Baru Yayasan Salafiyah Kajen Pati Tahun Pelajaran 2026 2027">
    <meta name="keywords" content="PPDB,Yayasan Salafiyah Kajen,Pati,Madrasah,Sekolah">
    <title>SPMB | Yayasan Salafiyah Kajen</title>
    <link rel="icon" type="image/x-icon" href="/img/logo.png" />
    <link href="/css/styles.css" rel="stylesheet" />
    <meta name="csrf-token" content="vG2v5kpi6UpAwPGG009N1B0fU97FYbO5oaPTZZPe">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .heading { width: 100%; margin: 10px 0; text-align: center; line-height: 100%; }
        .heading span { float: left; margin: 20px 0 -10px; border: 1px solid #aaa; width: 100%; }
        .heading h3 { text-transform: uppercase; display: inline; background-color: #fff; padding: 0 20px; font-size: 12pt; color: #aaa; }
        .pre-loader { position: fixed; z-index: 100; top: 0; left: 0; background: #191f26; display: flex; justify-content: center; align-items: center; height: 100%; width: 100%; }
        .pre-loader.hidden { animation: fadeOut 1s; animation-fill-mode: forwards; }
        @keyframes fadeOut { 100% { opacity: 0; visibility: hidden; } }
    </style>
</head>
<body>

<div class="pre-loader">
    <img class="loading-gif" alt="loading" src="https://media0.giphy.com/media/11FuEnXyGsXFba/source.gif" />
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="https://spmb.yayasansalafiyahkajen.com" style="font-size: 14pt;">
            <img src="/img/logo-yys.png" width="200" class="d-inline-block">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="https://spmb.yayasansalafiyahkajen.com">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="https://spmb.yayasansalafiyahkajen.com/registrasi">Registrasi</a></li>
                <li class="nav-item"><a class="nav-link" href="https://spmb.yayasansalafiyahkajen.com/informasi">Informasi</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container px-4 px-lg-5">
    <main class="mb-4">
        <section class="section mt-4">
            <div class="section-body">
                <form action="https://spmb.yayasansalafiyahkajen.com/registrasi" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="vG2v5kpi6UpAwPGG009N1B0fU97FYbO5oaPTZZPe" autocomplete="off">                    <div class="card mb-4">
                        <div class="card-header bg-success bg-gradient text-white">
                            <h5 class="pt-2 text-center">FORMULIR SPMB</h5>
                        </div>
                        <div class="card-body">

                            <!-- PILIHAN LEMBAGA & KELAS -->
                            <div class="row">
                                <div class="heading"><span></span><h3>Pilihan Lembaga dan Kelas</h3></div>

                                <div class="col-md-4 mb-4">
                                    <label class="mb-2 small fw-bold">Gelombang</label>
                                    <select name="gelombang_id" id="gelombang" class="form-select form-select-sm sel2" data-placeholder="Pilih salah satu">
                                        <option value=""></option>
                                                                                    <option value="4" >
                                                Gelombang 1
                                            </option>
                                                                            </select>
                                                                    </div>

                                <div class="col-md-4 mb-4">
                                    <label class="mb-2 small fw-bold">Lembaga</label>
                                    <select name="lembaga_id" id="lembaga" class="form-select form-select-sm sel2" data-placeholder="Pilih salah satu">
                                        <option value=""></option>
                                                                                    <option value="1" >
                                                PAUD
                                            </option>
                                                                                    <option value="2" >
                                                MI
                                            </option>
                                                                                    <option value="3" >
                                                MTs
                                            </option>
                                                                                    <option value="4" >
                                                MA
                                            </option>
                                                                                    <option value="5" >
                                                SMK
                                            </option>
                                                                                    <option value="6" >
                                                PATTA
                                            </option>
                                                                                    <option value="7" >
                                                PONPES ASSALAFIYAH
                                            </option>
                                                                                    <option value="8" >
                                                PONPES Bunyanun Marshush
                                            </option>
                                                                                    <option value="9" >
                                                PONPES Hajroh Basyir
                                            </option>
                                                                                    <option value="10" >
                                                PONPES Riyadlul Ma&#039;la Al Amin (RIMA)
                                            </option>
                                                                                    <option value="11" >
                                                PONPES Ukhuwah Salafiyah
                                            </option>
                                                                                    <option value="12" >
                                                PONPES Tahfidz Assalafiyah 2
                                            </option>
                                                                                    <option value="13" >
                                                PONPES Hajroh Basyir 2
                                            </option>
                                                                                    <option value="14" >
                                                PONPES Tahfidz Adzikro Assalafiyah 3
                                            </option>
                                                                                    <option value="15" >
                                                PONPES Salafiyah Kajen
                                            </option>
                                                                                    <option value="16" >
                                                PONPES Makhzanul Akhyar Assalafiyah
                                            </option>
                                                                            </select>
                                                                    </div>

                                <div class="col-md-4 mb-4">
                                    <label class="mb-2 small fw-bold">Kelas</label>
                                    <select name="konsentrasi_id" id="konsentrasi" class="form-select form-select-sm sel2" data-placeholder="Pilih salah satu" data-old="">
                                        <option value="">Pilih Kelas</option>
                                    </select>
                                                                    </div>
                            </div>

                            <!-- IDENTITAS -->
                            <div class="row">
                                <div class="heading"><span></span><h3>Identitas Calon Peserta Didik</h3></div>

                                <div class="col-md-4 mb-4">
                                    <label class="mb-2 small fw-bold required">Nama Lengkap</label>
                                    <input type="text" name="nama" value="" placeholder="Masukkan Nama Lengkap" class="form-control form-control-sm rounded-0">
                                                                    </div>

                                <div class="col-md-4 mb-4">
                                    <label class="mb-2 small fw-bold">No. HP</label>
                                    <input type="text" name="nohp" value="" placeholder="Contoh: 081123456" class="form-control form-control-sm">
                                                                    </div>

                                <div class="col-md-4 mb-4">
                                    <label class="mb-2 small fw-bold">Email Pribadi</label>
                                    <input type="email" name="email" value="" placeholder="Contoh: siswa@gmail.com" class="form-control form-control-sm">
                                                                    </div>

                                <div class="col-md-4 mb-4">
                                    <label class="mb-2 small fw-bold">Jenis Kelamin</label>
                                    <select name="jkel" class="form-select form-select-sm sel2" data-placeholder="Pilih salah satu">
                                        <option></option>
                                        <option value="L" >Laki-laki</option>
                                        <option value="P" >Perempuan</option>
                                    </select>
                                                                    </div>

                                <div class="col-md-4 mb-4">
                                    <label class="mb-2 small fw-bold">Golongan Darah</label>
                                    <select name="goldarah" class="form-select form-select-sm sel2" data-placeholder="Pilih salah satu">
                                        <option></option>
                                        <option value="-" >-</option>
                                        <option value="A" >A</option>
                                        <option value="B" >B</option>
                                        <option value="AB" >AB</option>
                                        <option value="O" >O</option>
                                    </select>
                                                                    </div>

                                <div class="col-md-4 mb-4">
                                    <label class="mb-2 small fw-bold">NIK</label>
                                    <input type="text" name="nik" value="" placeholder="Contoh: 3318123020002" class="form-control form-control-sm rounded-0">
                                                                    </div>

                                <div class="col-md-4 mb-4">
                                    <label class="mb-2 small fw-bold">Tempat Lahir (Kota/Kabupaten)</label>
                                    <select name="kotalahir" id="kotalahir" class="form-select form-select-sm sel2" data-placeholder="Ketik untuk mencari kota..." data-old="">
                                        <option value="">Ketik untuk mencari...</option>
                                    </select>
                                                                    </div>

                                <div class="col-md-4 mb-4">
                                    <label class="mb-2 small fw-bold">Tanggal Lahir</label>
                                    <input type="date" name="tgllahir" value="" class="form-control form-control-sm rounded-0">
                                                                    </div>
                            </div>

                            <!-- ALAMAT -->
                            <div class="row">
                                <div class="heading"><span></span><h3>Alamat</h3></div>

                                <div class="col-md-3 mb-4">
                                    <label class="mb-2 small fw-bold">Provinsi</label>
                                    <select name="prov_id" id="prov" class="form-select form-select-sm sel2">
                                        <option value="">Pilih Provinsi</option>
                                                                                    <option value="1" >ACEH</option>
                                                                                    <option value="2" >SUMATERA UTARA</option>
                                                                                    <option value="3" >SUMATERA BARAT</option>
                                                                                    <option value="4" >RIAU</option>
                                                                                    <option value="5" >JAMBI</option>
                                                                                    <option value="6" >SUMATERA SELATAN</option>
                                                                                    <option value="7" >BENGKULU</option>
                                                                                    <option value="8" >LAMPUNG</option>
                                                                                    <option value="9" >KEPULAUAN BANGKA BELITUNG</option>
                                                                                    <option value="10" >KEPULAUAN RIAU</option>
                                                                                    <option value="11" >DKI JAKARTA</option>
                                                                                    <option value="12" >JAWA BARAT</option>
                                                                                    <option value="13" >JAWA TENGAH</option>
                                                                                    <option value="14" >DAERAH ISTIMEWA YOGYAKARTA</option>
                                                                                    <option value="15" >JAWA TIMUR</option>
                                                                                    <option value="16" >BANTEN</option>
                                                                                    <option value="17" >BALI</option>
                                                                                    <option value="18" >NUSA TENGGARA BARAT</option>
                                                                                    <option value="19" >NUSA TENGGARA TIMUR</option>
                                                                                    <option value="20" >KALIMANTAN BARAT</option>
                                                                                    <option value="21" >KALIMANTAN TENGAH</option>
                                                                                    <option value="22" >KALIMANTAN SELATAN</option>
                                                                                    <option value="23" >KALIMANTAN TIMUR</option>
                                                                                    <option value="24" >KALIMANTAN UTARA</option>
                                                                                    <option value="25" >SULAWESI UTARA</option>
                                                                                    <option value="26" >SULAWESI TENGAH</option>
                                                                                    <option value="27" >SULAWESI SELATAN</option>
                                                                                    <option value="28" >SULAWESI TENGGARA</option>
                                                                                    <option value="29" >GORONTALO</option>
                                                                                    <option value="30" >SULAWESI BARAT</option>
                                                                                    <option value="31" >MALUKU</option>
                                                                                    <option value="32" >MALUKU UTARA</option>
                                                                                    <option value="33" >PAPUA</option>
                                                                                    <option value="34" >PAPUA BARAT</option>
                                                                            </select>
                                                                    </div>

                                <div class="col-md-3 mb-4">
                                    <label class="mb-2 small fw-bold">Kabupaten</label>
                                    <select name="kab_id" id="kab" class="form-select form-select-sm sel2" data-old="">
                                        <option value="">Pilih Kabupaten</option>
                                    </select>
                                                                    </div>

                                <div class="col-md-3 mb-4">
                                    <label class="mb-2 small fw-bold">Kecamatan</label>
                                    <select name="kec_id" id="kec" class="form-select form-select-sm sel2" data-old="">
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                                                    </div>

                                <div class="col-md-3 mb-4">
                                    <label class="mb-2 small fw-bold">Desa/Kelurahan</label>
                                    <select name="desa_id" id="desa" class="form-select form-select-sm sel2" data-old="">
                                        <option value="">Pilih Desa</option>
                                    </select>
                                                                    </div>

                                <div class="col-md-3 mb-4">
                                    <label class="mb-2 small fw-bold">Dusun</label>
                                    <input type="text" name="dusun" value="" placeholder="Contoh: Kajen" class="form-control form-control-sm">
                                                                    </div>

                                <div class="col-md-3 mb-4">
                                    <label class="mb-2 small fw-bold">Alamat</label>
                                    <input type="text" name="alamat" value="" placeholder="Contoh: Jalan Mawar No.33" class="form-control form-control-sm">
                                                                    </div>

                                <div class="col-md-2 mb-4">
                                    <label class="mb-2 small fw-bold">RT</label>
                                    <input type="text" name="rt" value="" placeholder="01" class="form-control form-control-sm">
                                                                    </div>

                                <div class="col-md-2 mb-4">
                                    <label class="mb-2 small fw-bold">RW</label>
                                    <input type="text" name="rw" value="" placeholder="01" class="form-control form-control-sm">
                                                                    </div>

                                <div class="col-md-2 mb-4">
                                    <label class="mb-2 small fw-bold">Kode POS</label>
                                    <input type="text" name="kodepos" value="" placeholder="59154" class="form-control form-control-sm">
                                    <small class="form-text text-muted"><a href="https://kodepos.posindonesia.co.id/" target="_blank">Cari di sini</a></small>
                                                                    </div>
                            </div>

                            <!-- PENDIDIKAN -->
                            <div class="row">
                                <div class="heading"><span></span><h3>Pendidikan</h3></div>

                                <div class="col-md-4 mb-4">
                                    <label class="mb-2 small fw-bold">Nama Sekolah Asal</label>
                                    <input type="text" name="asalsekolah" value="" placeholder="Contoh: MI Indonesia" class="form-control form-control-sm rounded-0">
                                                                    </div>

                                <div class="col-md-4 mb-4">
                                    <label class="mb-2 small fw-bold">NISN</label>
                                    <input type="text" name="nisn" value="" placeholder="Masukkan NISN" class="form-control form-control-sm rounded-0">
                                    <small class="form-text text-muted"><a href="https://nisn.data.kemdikbud.go.id/index.php/Cindex/formcaribynama" target="_blank">Cek NISN</a></small>
                                                                    </div>

                                <div class="col-md-4 mb-4">
                                    <label class="mb-2 small fw-bold">Alumni Salafiyah?</label>
                                    <select name="alumni" class="form-select form-select-sm sel2" data-placeholder="Pilih salah satu">
                                        <option></option>
                                        <option value="y" >Ya</option>
                                        <option value="t" >Tidak</option>
                                    </select>
                                                                    </div>
                            </div>

                            <!-- KELUARGA -->
                            <div class="row">
                                <div class="heading"><span></span><h3>Keluarga</h3></div>

                                <!-- Ayah -->
                                <div class="col-md-4 mb-4">
                                    <label class="mb-2 small fw-bold">Nama Ayah</label>
                                    <input type="text" name="namaayah" value="" placeholder="Masukkan Nama Ayah" class="form-control form-control-sm rounded-0">
                                                                    </div>
                                <div class="col-md-4 mb-4">
                                    <label class="mb-2 small fw-bold">Pekerjaan Ayah</label>
                                    <select name="pekerjaanayah" class="form-select form-select-sm sel2" data-placeholder="Pilih salah satu">
                                        <option></option>
                                                                                    <option value="1" >Tidak Bekerja</option>
                                                                                    <option value="2" >Nelayan</option>
                                                                                    <option value="3" >Petani</option>
                                                                                    <option value="4" >Peternak</option>
                                                                                    <option value="5" >PNS/TNI/POLRI</option>
                                                                                    <option value="6" >Karyawan Swasta</option>
                                                                                    <option value="7" >Pedagang Kecil</option>
                                                                                    <option value="8" >Pedagang Besar</option>
                                                                                    <option value="9" >Wiraswasta</option>
                                                                                    <option value="10" >Wirausaha</option>
                                                                                    <option value="11" >Buruh</option>
                                                                                    <option value="12" >Pensiunan</option>
                                                                                    <option value="13" >Tenaga Kerja Indonesia</option>
                                                                                    <option value="14" >Belum / Tidak Bekerja</option>
                                                                                    <option value="15" >Mengurus Rumah Tangga</option>
                                                                                    <option value="16" >Pelajar / Mahasiswa</option>
                                                                                    <option value="17" >Pensiunan</option>
                                                                                    <option value="18" >Pegawai Negeri Sipil</option>
                                                                                    <option value="19" >Tentara Nasional Indonesia</option>
                                                                                    <option value="20" >Kepolisian RI</option>
                                                                                    <option value="21" >Perdagangan</option>
                                                                                    <option value="22" >Petani / Pekebun</option>
                                                                                    <option value="23" >Peternak</option>
                                                                                    <option value="24" >Nelayan / Perikanan</option>
                                                                                    <option value="25" >Industri</option>
                                                                                    <option value="26" >Konstruksi</option>
                                                                                    <option value="27" >Transportasi</option>
                                                                                    <option value="28" >Karyawan Swasta</option>
                                                                                    <option value="29" >Karyawan BUMN</option>
                                                                                    <option value="30" >Karyawan BUMD</option>
                                                                                    <option value="31" >Karyawan Honorer</option>
                                                                                    <option value="32" >Buruh Harian Lepas</option>
                                                                                    <option value="33" >Buruh Tani / Perkebunan</option>
                                                                                    <option value="34" >Buruh Nelayan / Perikanan</option>
                                                                                    <option value="35" >Buruh Peternakan</option>
                                                                                    <option value="36" >Pembantu Rumah Tangga</option>
                                                                                    <option value="37" >Tukang Cukur</option>
                                                                                    <option value="38" >Tukang Listrik</option>
                                                                                    <option value="39" >Tukang Batu</option>
                                                                                    <option value="40" >Tukang Kayu</option>
                                                                                    <option value="41" >Tukang Sol Sepatu</option>
                                                                                    <option value="42" >Tukang Las / Pandai Besi</option>
                                                                                    <option value="43" >Tukang Jahit</option>
                                                                                    <option value="44" >Penata Rambut</option>
                                                                                    <option value="45" >Penata Rias</option>
                                                                                    <option value="46" >Penata Busana</option>
                                                                                    <option value="47" >Mekanik</option>
                                                                                    <option value="48" >Tukang Gigi</option>
                                                                                    <option value="49" >Seniman</option>
                                                                                    <option value="50" >Tabib</option>
                                                                                    <option value="51" >Paraji</option>
                                                                                    <option value="52" >Perancang Busana</option>
                                                                                    <option value="53" >Penterjemah</option>
                                                                                    <option value="54" >Imam Masjid</option>
                                                                                    <option value="55" >Pendeta</option>
                                                                                    <option value="56" >Pastur</option>
                                                                                    <option value="57" >Wartawan</option>
                                                                                    <option value="58" >Ustadz / Mubaligh</option>
                                                                                    <option value="59" >Juru Masak</option>
                                                                                    <option value="60" >Promotor Acara</option>
                                                                                    <option value="61" >Anggota DPR-RI</option>
                                                                                    <option value="62" >Anggota DPD</option>
                                                                                    <option value="63" >Anggota BPK</option>
                                                                                    <option value="64" >Presiden</option>
                                                                                    <option value="65" >Wakil Presiden</option>
                                                                                    <option value="66" >Anggota Mahkamah Konstitusi</option>
                                                                                    <option value="67" >Anggota Kabinet / Kementerian</option>
                                                                                    <option value="68" >Duta Besar</option>
                                                                                    <option value="69" >Gubernur</option>
                                                                                    <option value="70" >Wakil Gubernur</option>
                                                                                    <option value="71" >Bupati</option>
                                                                                    <option value="72" >Wakil Bupati</option>
                                                                                    <option value="73" >Walikota</option>
                                                                                    <option value="74" >Wakil Walikota</option>
                                                                                    <option value="75" >Anggota DPRD Propinsi</option>
                                                                                    <option value="76" >Anggota DPRD Kabupaten / Kota</option>
                                                                                    <option value="77" >Dosen</option>
                                                                                    <option value="78" >Guru</option>
                                                                                    <option value="79" >Pilot</option>
                                                                                    <option value="80" >Pengacara</option>
                                                                                    <option value="81" >Notaris</option>
                                                                                    <option value="82" >Arsitek</option>
                                                                                    <option value="83" >Akuntan</option>
                                                                                    <option value="84" >Konsultan</option>
                                                                                    <option value="85" >Dokter</option>
                                                                                    <option value="86" >Bidan</option>
                                                                                    <option value="87" >Perawat</option>
                                                                                    <option value="88" >Apoteker</option>
                                                                                    <option value="89" >Psikiater / Psikolog</option>
                                                                                    <option value="90" >Penyiar Televisi</option>
                                                                                    <option value="91" >Penyiar Radio</option>
                                                                                    <option value="92" >Pelaut</option>
                                                                                    <option value="93" >Peneliti</option>
                                                                                    <option value="94" >Sopir</option>
                                                                                    <option value="95" >Pialang</option>
                                                                                    <option value="96" >Paranormal</option>
                                                                                    <option value="97" >Pedagang</option>
                                                                                    <option value="98" >Perangkat Desa</option>
                                                                                    <option value="99" >Kepala Desa</option>
                                                                                    <option value="100" >Biarawati</option>
                                                                                    <option value="101" >Wiraswasta</option>
                                                                                    <option value="102" >Anggota Lembaga Tinggi</option>
                                                                                    <option value="103" >Artis</option>
                                                                                    <option value="104" >Atlit</option>
                                                                                    <option value="105" >Cheff</option>
                                                                                    <option value="106" >Manajer</option>
                                                                                    <option value="107" >Tenaga Tata Usaha</option>
                                                                                    <option value="108" >Operator</option>
                                                                                    <option value="109" >Pekerja Pengolahan, Kerajinan</option>
                                                                                    <option value="110" >Teknisi</option>
                                                                                    <option value="111" >Asisten Ahli</option>
                                                                                    <option value="112" >Lainnya</option>
                                                                            </select>
                                                                    </div>
                                <div class="col-md-4 mb-4">
                                    <label class="mb-2 small fw-bold">Pendidikan Ayah</label>
                                    <select name="pendidikanayah" class="form-select form-select-sm sel2" data-placeholder="Pilih salah satu">
                                        <option></option>
                                                                                    <option value="1" >Tidak Sekolah</option>
                                                                                    <option value="2" >Putus SD</option>
                                                                                    <option value="3" >SD Sederajat</option>
                                                                                    <option value="4" >SMP Sederajat</option>
                                                                                    <option value="5" >SMA Sederajat</option>
                                                                                    <option value="6" >D1</option>
                                                                                    <option value="7" >D2</option>
                                                                                    <option value="8" >D3</option>
                                                                                    <option value="9" >D4/S1</option>
                                                                                    <option value="10" >S2</option>
                                                                                    <option value="11" >S3</option>
                                                                            </select>
                                                                    </div>

                                <!-- Ibu -->
                                <div class="col-md-4 mb-4">
                                    <label class="mb-2 small fw-bold">Nama Ibu</label>
                                    <input type="text" name="namaibu" value="" placeholder="Masukkan Nama Ibu" class="form-control form-control-sm rounded-0">
                                                                    </div>
                                <div class="col-md-4 mb-4">
                                    <label class="mb-2 small fw-bold">Pekerjaan Ibu</label>
                                    <select name="pekerjaanibu" class="form-select form-select-sm sel2" data-placeholder="Pilih salah satu">
                                        <option></option>
                                                                                    <option value="1" >Tidak Bekerja</option>
                                                                                    <option value="2" >Nelayan</option>
                                                                                    <option value="3" >Petani</option>
                                                                                    <option value="4" >Peternak</option>
                                                                                    <option value="5" >PNS/TNI/POLRI</option>
                                                                                    <option value="6" >Karyawan Swasta</option>
                                                                                    <option value="7" >Pedagang Kecil</option>
                                                                                    <option value="8" >Pedagang Besar</option>
                                                                                    <option value="9" >Wiraswasta</option>
                                                                                    <option value="10" >Wirausaha</option>
                                                                                    <option value="11" >Buruh</option>
                                                                                    <option value="12" >Pensiunan</option>
                                                                                    <option value="13" >Tenaga Kerja Indonesia</option>
                                                                                    <option value="14" >Belum / Tidak Bekerja</option>
                                                                                    <option value="15" >Mengurus Rumah Tangga</option>
                                                                                    <option value="16" >Pelajar / Mahasiswa</option>
                                                                                    <option value="17" >Pensiunan</option>
                                                                                    <option value="18" >Pegawai Negeri Sipil</option>
                                                                                    <option value="19" >Tentara Nasional Indonesia</option>
                                                                                    <option value="20" >Kepolisian RI</option>
                                                                                    <option value="21" >Perdagangan</option>
                                                                                    <option value="22" >Petani / Pekebun</option>
                                                                                    <option value="23" >Peternak</option>
                                                                                    <option value="24" >Nelayan / Perikanan</option>
                                                                                    <option value="25" >Industri</option>
                                                                                    <option value="26" >Konstruksi</option>
                                                                                    <option value="27" >Transportasi</option>
                                                                                    <option value="28" >Karyawan Swasta</option>
                                                                                    <option value="29" >Karyawan BUMN</option>
                                                                                    <option value="30" >Karyawan BUMD</option>
                                                                                    <option value="31" >Karyawan Honorer</option>
                                                                                    <option value="32" >Buruh Harian Lepas</option>
                                                                                    <option value="33" >Buruh Tani / Perkebunan</option>
                                                                                    <option value="34" >Buruh Nelayan / Perikanan</option>
                                                                                    <option value="35" >Buruh Peternakan</option>
                                                                                    <option value="36" >Pembantu Rumah Tangga</option>
                                                                                    <option value="37" >Tukang Cukur</option>
                                                                                    <option value="38" >Tukang Listrik</option>
                                                                                    <option value="39" >Tukang Batu</option>
                                                                                    <option value="40" >Tukang Kayu</option>
                                                                                    <option value="41" >Tukang Sol Sepatu</option>
                                                                                    <option value="42" >Tukang Las / Pandai Besi</option>
                                                                                    <option value="43" >Tukang Jahit</option>
                                                                                    <option value="44" >Penata Rambut</option>
                                                                                    <option value="45" >Penata Rias</option>
                                                                                    <option value="46" >Penata Busana</option>
                                                                                    <option value="47" >Mekanik</option>
                                                                                    <option value="48" >Tukang Gigi</option>
                                                                                    <option value="49" >Seniman</option>
                                                                                    <option value="50" >Tabib</option>
                                                                                    <option value="51" >Paraji</option>
                                                                                    <option value="52" >Perancang Busana</option>
                                                                                    <option value="53" >Penterjemah</option>
                                                                                    <option value="54" >Imam Masjid</option>
                                                                                    <option value="55" >Pendeta</option>
                                                                                    <option value="56" >Pastur</option>
                                                                                    <option value="57" >Wartawan</option>
                                                                                    <option value="58" >Ustadz / Mubaligh</option>
                                                                                    <option value="59" >Juru Masak</option>
                                                                                    <option value="60" >Promotor Acara</option>
                                                                                    <option value="61" >Anggota DPR-RI</option>
                                                                                    <option value="62" >Anggota DPD</option>
                                                                                    <option value="63" >Anggota BPK</option>
                                                                                    <option value="64" >Presiden</option>
                                                                                    <option value="65" >Wakil Presiden</option>
                                                                                    <option value="66" >Anggota Mahkamah Konstitusi</option>
                                                                                    <option value="67" >Anggota Kabinet / Kementerian</option>
                                                                                    <option value="68" >Duta Besar</option>
                                                                                    <option value="69" >Gubernur</option>
                                                                                    <option value="70" >Wakil Gubernur</option>
                                                                                    <option value="71" >Bupati</option>
                                                                                    <option value="72" >Wakil Bupati</option>
                                                                                    <option value="73" >Walikota</option>
                                                                                    <option value="74" >Wakil Walikota</option>
                                                                                    <option value="75" >Anggota DPRD Propinsi</option>
                                                                                    <option value="76" >Anggota DPRD Kabupaten / Kota</option>
                                                                                    <option value="77" >Dosen</option>
                                                                                    <option value="78" >Guru</option>
                                                                                    <option value="79" >Pilot</option>
                                                                                    <option value="80" >Pengacara</option>
                                                                                    <option value="81" >Notaris</option>
                                                                                    <option value="82" >Arsitek</option>
                                                                                    <option value="83" >Akuntan</option>
                                                                                    <option value="84" >Konsultan</option>
                                                                                    <option value="85" >Dokter</option>
                                                                                    <option value="86" >Bidan</option>
                                                                                    <option value="87" >Perawat</option>
                                                                                    <option value="88" >Apoteker</option>
                                                                                    <option value="89" >Psikiater / Psikolog</option>
                                                                                    <option value="90" >Penyiar Televisi</option>
                                                                                    <option value="91" >Penyiar Radio</option>
                                                                                    <option value="92" >Pelaut</option>
                                                                                    <option value="93" >Peneliti</option>
                                                                                    <option value="94" >Sopir</option>
                                                                                    <option value="95" >Pialang</option>
                                                                                    <option value="96" >Paranormal</option>
                                                                                    <option value="97" >Pedagang</option>
                                                                                    <option value="98" >Perangkat Desa</option>
                                                                                    <option value="99" >Kepala Desa</option>
                                                                                    <option value="100" >Biarawati</option>
                                                                                    <option value="101" >Wiraswasta</option>
                                                                                    <option value="102" >Anggota Lembaga Tinggi</option>
                                                                                    <option value="103" >Artis</option>
                                                                                    <option value="104" >Atlit</option>
                                                                                    <option value="105" >Cheff</option>
                                                                                    <option value="106" >Manajer</option>
                                                                                    <option value="107" >Tenaga Tata Usaha</option>
                                                                                    <option value="108" >Operator</option>
                                                                                    <option value="109" >Pekerja Pengolahan, Kerajinan</option>
                                                                                    <option value="110" >Teknisi</option>
                                                                                    <option value="111" >Asisten Ahli</option>
                                                                                    <option value="112" >Lainnya</option>
                                                                            </select>
                                                                    </div>
                                <div class="col-md-4 mb-4">
                                    <label class="mb-2 small fw-bold">Pendidikan Ibu</label>
                                    <select name="pendidikanibu" class="form-select form-select-sm sel2" data-placeholder="Pilih salah satu">
                                        <option></option>
                                                                                    <option value="1" >Tidak Sekolah</option>
                                                                                    <option value="2" >Putus SD</option>
                                                                                    <option value="3" >SD Sederajat</option>
                                                                                    <option value="4" >SMP Sederajat</option>
                                                                                    <option value="5" >SMA Sederajat</option>
                                                                                    <option value="6" >D1</option>
                                                                                    <option value="7" >D2</option>
                                                                                    <option value="8" >D3</option>
                                                                                    <option value="9" >D4/S1</option>
                                                                                    <option value="10" >S2</option>
                                                                                    <option value="11" >S3</option>
                                                                            </select>
                                                                    </div>

                                <!-- Wali -->
                                <div class="col-md-3 mb-4">
                                    <label class="mb-2 small fw-bold">Nama Wali</label>
                                    <input type="text" name="namawali" value="" placeholder="Masukkan Nama Wali" class="form-control form-control-sm rounded-0">
                                                                    </div>
                                <div class="col-md-3 mb-4">
                                    <label class="mb-2 small fw-bold">Pekerjaan Wali</label>
                                    <select name="pekerjaanwali" class="form-select form-select-sm sel2" data-placeholder="Pilih salah satu">
                                        <option></option>
                                                                                    <option value="1" >Tidak Bekerja</option>
                                                                                    <option value="2" >Nelayan</option>
                                                                                    <option value="3" >Petani</option>
                                                                                    <option value="4" >Peternak</option>
                                                                                    <option value="5" >PNS/TNI/POLRI</option>
                                                                                    <option value="6" >Karyawan Swasta</option>
                                                                                    <option value="7" >Pedagang Kecil</option>
                                                                                    <option value="8" >Pedagang Besar</option>
                                                                                    <option value="9" >Wiraswasta</option>
                                                                                    <option value="10" >Wirausaha</option>
                                                                                    <option value="11" >Buruh</option>
                                                                                    <option value="12" >Pensiunan</option>
                                                                                    <option value="13" >Tenaga Kerja Indonesia</option>
                                                                                    <option value="14" >Belum / Tidak Bekerja</option>
                                                                                    <option value="15" >Mengurus Rumah Tangga</option>
                                                                                    <option value="16" >Pelajar / Mahasiswa</option>
                                                                                    <option value="17" >Pensiunan</option>
                                                                                    <option value="18" >Pegawai Negeri Sipil</option>
                                                                                    <option value="19" >Tentara Nasional Indonesia</option>
                                                                                    <option value="20" >Kepolisian RI</option>
                                                                                    <option value="21" >Perdagangan</option>
                                                                                    <option value="22" >Petani / Pekebun</option>
                                                                                    <option value="23" >Peternak</option>
                                                                                    <option value="24" >Nelayan / Perikanan</option>
                                                                                    <option value="25" >Industri</option>
                                                                                    <option value="26" >Konstruksi</option>
                                                                                    <option value="27" >Transportasi</option>
                                                                                    <option value="28" >Karyawan Swasta</option>
                                                                                    <option value="29" >Karyawan BUMN</option>
                                                                                    <option value="30" >Karyawan BUMD</option>
                                                                                    <option value="31" >Karyawan Honorer</option>
                                                                                    <option value="32" >Buruh Harian Lepas</option>
                                                                                    <option value="33" >Buruh Tani / Perkebunan</option>
                                                                                    <option value="34" >Buruh Nelayan / Perikanan</option>
                                                                                    <option value="35" >Buruh Peternakan</option>
                                                                                    <option value="36" >Pembantu Rumah Tangga</option>
                                                                                    <option value="37" >Tukang Cukur</option>
                                                                                    <option value="38" >Tukang Listrik</option>
                                                                                    <option value="39" >Tukang Batu</option>
                                                                                    <option value="40" >Tukang Kayu</option>
                                                                                    <option value="41" >Tukang Sol Sepatu</option>
                                                                                    <option value="42" >Tukang Las / Pandai Besi</option>
                                                                                    <option value="43" >Tukang Jahit</option>
                                                                                    <option value="44" >Penata Rambut</option>
                                                                                    <option value="45" >Penata Rias</option>
                                                                                    <option value="46" >Penata Busana</option>
                                                                                    <option value="47" >Mekanik</option>
                                                                                    <option value="48" >Tukang Gigi</option>
                                                                                    <option value="49" >Seniman</option>
                                                                                    <option value="50" >Tabib</option>
                                                                                    <option value="51" >Paraji</option>
                                                                                    <option value="52" >Perancang Busana</option>
                                                                                    <option value="53" >Penterjemah</option>
                                                                                    <option value="54" >Imam Masjid</option>
                                                                                    <option value="55" >Pendeta</option>
                                                                                    <option value="56" >Pastur</option>
                                                                                    <option value="57" >Wartawan</option>
                                                                                    <option value="58" >Ustadz / Mubaligh</option>
                                                                                    <option value="59" >Juru Masak</option>
                                                                                    <option value="60" >Promotor Acara</option>
                                                                                    <option value="61" >Anggota DPR-RI</option>
                                                                                    <option value="62" >Anggota DPD</option>
                                                                                    <option value="63" >Anggota BPK</option>
                                                                                    <option value="64" >Presiden</option>
                                                                                    <option value="65" >Wakil Presiden</option>
                                                                                    <option value="66" >Anggota Mahkamah Konstitusi</option>
                                                                                    <option value="67" >Anggota Kabinet / Kementerian</option>
                                                                                    <option value="68" >Duta Besar</option>
                                                                                    <option value="69" >Gubernur</option>
                                                                                    <option value="70" >Wakil Gubernur</option>
                                                                                    <option value="71" >Bupati</option>
                                                                                    <option value="72" >Wakil Bupati</option>
                                                                                    <option value="73" >Walikota</option>
                                                                                    <option value="74" >Wakil Walikota</option>
                                                                                    <option value="75" >Anggota DPRD Propinsi</option>
                                                                                    <option value="76" >Anggota DPRD Kabupaten / Kota</option>
                                                                                    <option value="77" >Dosen</option>
                                                                                    <option value="78" >Guru</option>
                                                                                    <option value="79" >Pilot</option>
                                                                                    <option value="80" >Pengacara</option>
                                                                                    <option value="81" >Notaris</option>
                                                                                    <option value="82" >Arsitek</option>
                                                                                    <option value="83" >Akuntan</option>
                                                                                    <option value="84" >Konsultan</option>
                                                                                    <option value="85" >Dokter</option>
                                                                                    <option value="86" >Bidan</option>
                                                                                    <option value="87" >Perawat</option>
                                                                                    <option value="88" >Apoteker</option>
                                                                                    <option value="89" >Psikiater / Psikolog</option>
                                                                                    <option value="90" >Penyiar Televisi</option>
                                                                                    <option value="91" >Penyiar Radio</option>
                                                                                    <option value="92" >Pelaut</option>
                                                                                    <option value="93" >Peneliti</option>
                                                                                    <option value="94" >Sopir</option>
                                                                                    <option value="95" >Pialang</option>
                                                                                    <option value="96" >Paranormal</option>
                                                                                    <option value="97" >Pedagang</option>
                                                                                    <option value="98" >Perangkat Desa</option>
                                                                                    <option value="99" >Kepala Desa</option>
                                                                                    <option value="100" >Biarawati</option>
                                                                                    <option value="101" >Wiraswasta</option>
                                                                                    <option value="102" >Anggota Lembaga Tinggi</option>
                                                                                    <option value="103" >Artis</option>
                                                                                    <option value="104" >Atlit</option>
                                                                                    <option value="105" >Cheff</option>
                                                                                    <option value="106" >Manajer</option>
                                                                                    <option value="107" >Tenaga Tata Usaha</option>
                                                                                    <option value="108" >Operator</option>
                                                                                    <option value="109" >Pekerja Pengolahan, Kerajinan</option>
                                                                                    <option value="110" >Teknisi</option>
                                                                                    <option value="111" >Asisten Ahli</option>
                                                                                    <option value="112" >Lainnya</option>
                                                                            </select>
                                                                    </div>
                                <div class="col-md-3 mb-4">
                                    <label class="mb-2 small fw-bold">Pendidikan Wali</label>
                                    <select name="pendidikanwali" class="form-select form-select-sm sel2" data-placeholder="Pilih salah satu">
                                        <option></option>
                                                                                    <option value="1" >Tidak Sekolah</option>
                                                                                    <option value="2" >Putus SD</option>
                                                                                    <option value="3" >SD Sederajat</option>
                                                                                    <option value="4" >SMP Sederajat</option>
                                                                                    <option value="5" >SMA Sederajat</option>
                                                                                    <option value="6" >D1</option>
                                                                                    <option value="7" >D2</option>
                                                                                    <option value="8" >D3</option>
                                                                                    <option value="9" >D4/S1</option>
                                                                                    <option value="10" >S2</option>
                                                                                    <option value="11" >S3</option>
                                                                            </select>
                                                                    </div>
                                <div class="col-md-3 mb-4">
                                    <label class="mb-2 small fw-bold">Telp Wali</label>
                                    <input type="text" name="telpwali" value="" placeholder="Masukkan No Telp Wali" class="form-control form-control-sm rounded-0" required>
                                                                    </div>
                            </div>

                            <!-- UNGGAH BERKAS -->
                            <div class="row">
                                <div class="heading"><span></span><h3>Unggah Berkas (Maks. 1MB per file)</h3></div>

                                <div class="col-md-6 mb-4">
                                    <label class="mb-2 small fw-bold">Foto</label>
                                    <input type="file" name="foto" class="form-control form-control-sm rounded-0" accept="image/*">
                                                                    </div>
                                <div class="col-md-6 mb-4">
                                    <label class="mb-2 small fw-bold">Kartu Keluarga</label>
                                    <input type="file" name="kk" class="form-control form-control-sm rounded-0" accept="image/*">
                                                                    </div>
                                <div class="col-md-6 mb-4">
                                    <label class="mb-2 small fw-bold">KTP Orang Tua</label>
                                    <input type="file" name="ktp" class="form-control form-control-sm rounded-0" accept="image/*">
                                                                    </div>
                                <div class="col-md-6 mb-4">
                                    <label class="mb-2 small fw-bold">Akta Kelahiran</label>
                                    <input type="file" name="aktalahir" class="form-control form-control-sm rounded-0" accept="image/*">
                                                                    </div>
                                <div class="col-md-6 mb-4">
                                    <label class="mb-2 small fw-bold required">KIP</label>
                                    <input type="file" name="kip" class="form-control form-control-sm rounded-0" accept="image/*">
                                                                    </div>
                                <div class="col-md-6 mb-4">
                                    <label class="mb-2 small fw-bold">PKH</label>
                                    <input type="file" name="pkh" class="form-control form-control-sm rounded-0" accept="image/*">
                                                                    </div>
                                <div class="col-md-6 mb-4">
                                    <label class="mb-2 small fw-bold">KKS</label>
                                    <input type="file" name="kks" class="form-control form-control-sm rounded-0" accept="image/*">
                                                                    </div>
                            </div>

                            <div id="rincian_biaya"></div>

                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-success bg-gradient">Kirim Pendaftaran</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
</div>

<footer class="py-3 bg-dark">
    <div class="container px-4 px-lg-5">
        <p class="m-0 text-center text-white">Copyright &copy; Yayasan Salafiyah Kajen 2024</p>
    </div>
</footer>

<script>
$(document).ready(function() {
    // === SELECT2 INIT ===
    $('.sel2').select2({
        theme: 'bootstrap-5',
        width: '100%',
        placeholder: function() { return $(this).data('placeholder') || 'Pilih'; }
    });

    // === KOTA LAHIR (AJAX SEARCH) ===
    $('#kotalahir').select2({
        theme: 'bootstrap-5',
        width: '100%',
        placeholder: 'Ketik nama kota...',
        ajax: {
            url: 'https://spmb.yayasansalafiyahkajen.com/cities-all',
            dataType: 'json',
            delay: 300,
            cache: true,
            data: params => ({ q: params.term }),
            processResults: data => ({ results: data })
        },
        escapeMarkup: m => m,
        templateResult: data => !data.id ? data.text : $('<span>').html(data.text),
        templateSelection: data => !data.id ? data.text : data.text.replace(/<\/?[^>]+(>|$)/g, "")
    });

    // Restore old kotalahir
    const oldKota = $('#kotalahir').data('old');
    if (oldKota) {
        $.ajax({
            url: 'https://spmb.yayasansalafiyahkajen.com/cities-all', // arahkan ke cities_all_cached
            data: { id: oldKota }, // kirim id kota
            dataType: 'json',
            success: function (data) {
                const city = Array.isArray(data) ? data[0] : data;
                if (city) {
                    const cleanText = city.text.replace(/<\/?[^>]+(>|$)/g, "");
                    const option = new Option(cleanText, city.id, true, true);
                    $('#kotalahir').append(option).trigger('change');
                }
            }
        });
    }

    // === WILAYAH DOMISILI ===
    const loadWilayah = (route, id, target, callback) => {
        if (!id) return;
        $.get("https://spmb.yayasansalafiyahkajen.com/" + route + "?id=" + id, data => {
            $(target).empty().append('<option value="">Pilih</option>');
            $.each(data, (key, value) => $(target).append('<option value="' + key + '">' + value + '</option>'));
            const oldVal = $(target).data('old');
            if (oldVal) $(target).val(oldVal).trigger('change');
            if (callback) callback();
        });
    };

    $('#prov').on('change', function() {
        $('#kab, #kec, #desa').empty().append('<option value="">Pilih</option>').trigger('change');
        if (this.value) loadWilayah('cities', this.value, '#kab', () => $('#kab').data('old') && $('#kab').trigger('change'));
    });

    $('#kab').on('change', function() {
        $('#kec, #desa').empty().append('<option value="">Pilih</option>').trigger('change');
        if (this.value) loadWilayah('districts', this.value, '#kec', () => $('#kec').data('old') && $('#kec').trigger('change'));
    });

    $('#kec').on('change', function() {
        $('#desa').empty().append('<option value="">Pilih</option>').trigger('change');
        if (this.value) loadWilayah('villages', this.value, '#desa');
    });

    // Auto trigger provinsi

    // === LEMBAGA → KONSENTRASI → BIAYA ===
    $('#lembaga').on('change', function() {
        const id = this.value;
        $('#konsentrasi').empty().append('<option value="">Pilih Kelas</option>');
        if (id) {
            $.get('https://spmb.yayasansalafiyahkajen.com/konsentrasi?id=' + id, data => {
                $.each(data, (key, value) => $('#konsentrasi').append('<option value="' + key + '">' + value + '</option>'));
                const oldKons = '';
                if (oldKons) $('#konsentrasi').val(oldKons).trigger('change');
            });
        }
    });

    $('#konsentrasi').on('change', function() {
        const id = this.value;
        $('#rincian_biaya').html('');
        if (id) $.get("https://spmb.yayasansalafiyahkajen.com/biaya/" + id, data => $('#rincian_biaya').html(data));
    });

    // Auto trigger lembaga
    });

// Flash Message

// Preloader
window.addEventListener('load', () => document.querySelector('.pre-loader').classList.add('hidden'));
</script>

</body>
</html> --}}