<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulir Pendaftaran - {{ $pendaftar->nama_lengkap }}</title>
    <style>
        /* Basic reset */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html, body { height: 100%; }
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 11pt;
            color: #111;
            background: #fff;
            padding: 1.2cm; /* leave margin for printing */
            line-height: 1.35;
        }

        .paper {
            width: 100%;
            max-width: 21cm;
            margin: 0 auto;
        }

        /* Header */
        .header {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-bottom: 8px;
            border-bottom: 2px solid #000;
            padding-bottom: 8px;
        }

        .logo {
            width: 3.6cm;
            height: 3.6cm;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .logo img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .school-info {
            flex: 1;
            text-align: left;
        }

        .school-info h1 {
            font-size: 14pt;
            margin-bottom: 2px;
            letter-spacing: 0.5px;
        }

        .school-info h2 {
            font-size: 12pt;
            margin-bottom: 2px;
            font-weight: 700;
        }

        .school-info p {
            font-size: 9pt;
            margin-top: 3px;
        }

        /* Title box */
        .title-box {
            text-align: center;
            margin: 12px 0 14px;
            padding: 8px;
            border: 1px solid #d0d0d0;
            background: #fafafa;
        }

        .title-box h3 {
            font-size: 13pt;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .title-box p { font-size: 11pt; margin-top: 2px; }

        /* Generic section title */
        .section-title {
            background: #efefef;
            padding: 6px 10px;
            font-weight: 700;
            margin-top: 10px;
            margin-bottom: 6px;
            border-left: 5px solid #000;
            font-size: 10.5pt;
        }

        /* Table styling */
        table.form-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
        }

        table.form-table td {
            padding: 5px 6px;
            vertical-align: top;
            font-size: 10.5pt;
        }

        td.number { width: 34px; font-weight: 700; }
        td.colon { width: 12px; text-align: center; font-weight: 700; }
        td.field-label { width: 36%; padding-left: 8px; }
        td.field-value { width: 52%; }

        .sub-table td { padding: 3px 6px; font-size: 10.2pt; }

        .value-strong { font-weight: 700; text-transform: uppercase; }

        /* Note + Photo + Signature container */
        .note-box {
            border: 1.2px solid #000;
            margin-top: 16px;
            padding: 12px;
            display: flex;
            gap: 14px;
            align-items: flex-start;
            background: #fff;
        }

        .note-text {
            flex: 1;
            font-size: 10.5pt;
            text-align: justify;
        }

        .note-text p { margin-bottom: 6px; }

        .photo-in-note {
            width: 3.5cm;
            height: 4.5cm;
            border: 1.2px solid #000;
            background: #f7f7f7;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 10pt;
            flex-shrink: 0;
        }

        .photo-in-note img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Signature area inside note */
        .note-sign {
            margin-top: 6px;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 6px;
        }

        .signature-location {
            font-size: 10pt;
            margin-right: 2px;
        }

        .signature-name {
            display: inline-block;
            min-width: 180px;
            border-top: 1px solid #000;
            padding-top: 6px;
            text-align: center;
            font-weight: 700;
        }

        /* Footer */
        .footer-text {
            margin-top: 10px;
            text-align: center;
            font-size: 9pt;
            color: #666;
        }

        /* Small helpers */
        .muted { color: #666; font-size: 9.5pt; }

        @page {
            margin: 1.2cm;
        }

        @media print {
            body { padding: 0; }
            .note-box { page-break-inside: avoid; }
        }
    </style>
</head>

<body>
    <div class="paper">
        <!-- Header -->
        <div class="header">
            <div class="logo">
                {{-- Ganti path logo jika perlu --}}
                @if(file_exists(public_path('images/logo.png')))
                    <img src="{{ public_path('images/logo.png') }}" alt="Logo Sekolah">
                @else
                    {{-- Placeholder logo --}}
                    <div style="font-size:10pt; text-align:center;">LOGO</div>
                @endif
            </div>

            <div class="school-info">
                <h1>YAYASAN AL - ZAHRA HAJAIN</h1>
                <h2>SMK CORDOVA MARGOYOSO</h2>
                <p>NSM 402031816024 / NPSN 20341574<br>
                    Jalan Polgarut Selatan - Kajen - Margoyoso Kecamatan Margoyoso, Kabupaten Pati - Jawa Tengah
                </p>
            </div>
        </div>

        <!-- Title -->
        <div class="title-box">
            <h3>FORMULIR PENDAFTARAN MURID BARU</h3>
            <p>TAHUN PELAJARAN {{ optional($pendaftar->gelombang)->tapel ?? '-' }}</p>
        </div>

        <!-- SECTION A -->
        <div class="section-title">A. KETERANGAN TENTANG DIRI MURID</div>
        <table class="form-table">
            <tr>
                <td class="number">1.</td>
                <td class="field-label">Nama Lengkap</td>
                <td class="colon">:</td>
                <td class="field-value value-strong">{{ strtoupper($pendaftar->nama_lengkap ?? '-') }}</td>
            </tr>
            <tr>
                <td class="number">2.</td>
                <td class="field-label">NISN</td>
                <td class="colon">:</td>
                <td class="field-value">{{ $pendaftar->nisn ?? '-' }}</td>
            </tr>
            <tr>
                <td class="number">3.</td>
                <td class="field-label">NIK</td>
                <td class="colon">:</td>
                <td class="field-value">{{ $pendaftar->nik ?? '-' }}</td>
            </tr>
            <tr>
                <td class="number">4.</td>
                <td class="field-label">Jenis Kelamin</td>
                <td class="colon">:</td>
                <td class="field-value">{{ $pendaftar->jkel == 'L' ? 'Laki-laki' : ($pendaftar->jkel == 'P' ? 'Perempuan' : '-') }}</td>
            </tr>
            <tr>
                <td class="number">5.</td>
                <td class="field-label">Tempat, Tanggal Lahir</td>
                <td class="colon">:</td>
                <td class="field-value">{{ strtoupper($pendaftar->tempat_lahir ?? '-') }}, {{ $pendaftar->tanggal_lahir ? \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->format('d F Y') : '-' }}</td>
            </tr>
            <tr>
                <td class="number">6.</td>
                <td class="field-label">Golongan Darah</td>
                <td class="colon">:</td>
                <td class="field-value">{{ $pendaftar->gol_darah ?? '-' }}</td>
            </tr>
            <tr>
                <td class="number">7.</td>
                <td class="field-label">Alamat</td>
                <td class="colon">:</td>
                <td class="field-value">
                    {{ $pendaftar->alamat ?? '-' }}, RT {{ $pendaftar->rt ?? '-' }}/RW {{ $pendaftar->rw ?? '-' }},
                    Dusun {{ $pendaftar->dusun ?? '-' }}, Desa {{ $pendaftar->desa ?? '-' }}, Kecamatan {{ $pendaftar->kecamatan ?? '-' }},
                    {{ $pendaftar->kabupaten ?? '-' }}, {{ $pendaftar->provinsi ?? '-' }}, {{ $pendaftar->kodepos ?? '-' }}
                </td>
            </tr>
            <tr>
                <td class="number">8.</td>
                <td class="field-label">Nomor HP</td>
                <td class="colon">:</td>
                <td class="field-value">{{ $pendaftar->no_hp ?? '-' }}</td>
            </tr>
            <tr>
                <td class="number">9.</td>
                <td class="field-label">Email</td>
                <td class="colon">:</td>
                <td class="field-value">{{ $pendaftar->email ?? '-' }}</td>
            </tr>
        </table>

        <!-- SECTION B -->
        <div class="section-title">B. KETERANGAN PENDIDIKAN</div>
        <table class="form-table">
            <tr>
                <td class="number">10.</td>
                <td class="field-label">Asal Sekolah</td>
                <td class="colon">:</td>
                <td class="field-value">{{ $pendaftar->asalsekolah ?? '-' }}</td>
            </tr>
            <tr>
                <td class="number">11.</td>
                <td class="field-label">Jurusan / Pilihan</td>
                <td class="colon">:</td>
                <td class="field-value">{{ strtoupper($pendaftar->jurusan ?? '-') }}</td>
            </tr>
            <tr>
                <td class="number">12.</td>
                <td class="field-label">Rekomendasi</td>
                <td class="colon">:</td>
                <td class="field-value">{{ $pendaftar->rekomendasi ?? '-' }}</td>
            </tr>
        </table>

        <!-- SECTION C -->
        <div class="section-title">C. KETERANGAN TENTANG ORANG TUA / WALI</div>
        <table class="form-table">
            <tr>
                <td class="number">13.</td>
                <td class="field-label">Nama Ayah</td>
                <td class="colon">:</td>
                <td class="field-value">{{ $pendaftar->nama_ayah ?? '-' }}</td>
            </tr>
            <tr>
                <td class="number">14.</td>
                <td class="field-label">Pekerjaan Ayah</td>
                <td class="colon">:</td>
                <td class="field-value">{{ $pendaftar->pekerjaan_ayah ?? '-' }}</td>
            </tr>
            <tr>
                <td class="number">15.</td>
                <td class="field-label">Pendidikan Ayah</td>
                <td class="colon">:</td>
                <td class="field-value">{{ $pendaftar->pendidikan_ayah ?? '-' }}</td>
            </tr>

            <tr>
                <td class="number">16.</td>
                <td class="field-label">Nama Ibu</td>
                <td class="colon">:</td>
                <td class="field-value">{{ $pendaftar->nama_ibu ?? '-' }}</td>
            </tr>
            <tr>
                <td class="number">17.</td>
                <td class="field-label">Pekerjaan Ibu</td>
                <td class="colon">:</td>
                <td class="field-value">{{ $pendaftar->pekerjaan_ibu ?? '-' }}</td>
            </tr>
            <tr>
                <td class="number">18.</td>
                <td class="field-label">Pendidikan Ibu</td>
                <td class="colon">:</td>
                <td class="field-value">{{ $pendaftar->pendidikan_ibu ?? '-' }}</td>
            </tr>

            @if($pendaftar->nama_wali)
                <tr>
                    <td class="number">19.</td>
                    <td class="field-label">Nama Wali</td>
                    <td class="colon">:</td>
                    <td class="field-value">{{ $pendaftar->nama_wali }}</td>
                </tr>
                <tr>
                    <td class="number"></td>
                    <td class="field-label">Pekerjaan Wali</td>
                    <td class="colon">:</td>
                    <td class="field-value">{{ $pendaftar->pekerjaan_wali ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="number"></td>
                    <td class="field-label">No. Telp Wali</td>
                    <td class="colon">:</td>
                    <td class="field-value">{{ $pendaftar->telp_wali ?? '-' }}</td>
                </tr>
            @endif
        </table>

        <!-- Documents row (kk, ktp ortu, akta lahir etc) -->
        <div class="section-title">D. DOKUMEN TERKAIT</div>
        <table class="form-table">
            <tr>
                <td class="number">20.</td>
                <td class="field-label">Kartu Keluarga (KK)</td>
                <td class="colon">:</td>
                <td class="field-value">{{ $pendaftar->kk ? 'Tersedia' : '-' }}</td>
            </tr>
            <tr>
                <td class="number">21.</td>
                <td class="field-label">KTP Orang Tua</td>
                <td class="colon">:</td>
                <td class="field-value">{{ $pendaftar->ktp_ortu ? 'Tersedia' : '-' }}</td>
            </tr>
            <tr>
                <td class="number">22.</td>
                <td class="field-label">Akte Kelahiran</td>
                <td class="colon">:</td>
                <td class="field-value">{{ $pendaftar->aktalahir ? 'Tersedia' : '-' }}</td>
            </tr>
            <tr>
                <td class="number">23.</td>
                <td class="field-label">Bantuan (KIP/PKH/KKS)</td>
                <td class="colon">:</td>
                <td class="field-value">
                    @php
                        $bantuan = [];
                        if($pendaftar->kip) $bantuan[] = 'KIP';
                        if($pendaftar->pkh) $bantuan[] = 'PKH';
                        if($pendaftar->kks) $bantuan[] = 'KKS';
                    @endphp
                    {{ count($bantuan) ? implode(', ', $bantuan) : '-' }}
                </td>
            </tr>
        </table>

        <!-- Note + Photo + Signature -->
        <div class="note-box">
            <div class="note-text">
                <p><strong>Note :</strong></p>
                <p>Formulir ini merupakan hasil isian data saya di Website Portal PPDB Online.</p>
                <p><strong>Saya bertanggung jawab penuh atas seluruh isian data di formulir ini.</strong></p>

                <div class="note-sign" style="width:100%; margin-top:8px;">
                    <div class="signature-location">
                        {{ $pendaftar->desa ?? '-' }}, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                    </div>
                    <div class="signature-name">{{ strtoupper($pendaftar->nama_lengkap ?? '-') }}</div>
                </div>
            </div>

            <div class="photo-in-note">
                @if($pendaftar->foto && file_exists(public_path('storage/'.$pendaftar->foto)))
                    <img src="{{ public_path('storage/'.$pendaftar->foto) }}" alt="Foto Peserta">
                @else
                    <div>PAS<br>FOTO<br>4x6</div>
                @endif
            </div>
        </div>

        <!-- Footer -->
        <div class="footer-text">
            Dicetak pada {{ \Carbon\Carbon::now()->format('d M Y H:i:s') }} — Nomor Pendaftaran: {{ $pendaftar->nomor_pendaftaran ?? '-' }}
        </div>
    </div>
</body>

</html>
