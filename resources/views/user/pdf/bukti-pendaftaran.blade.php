<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pendaftaran - {{ $pendaftar->nama_lengkap }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
            line-height: 1.6;
            padding: 0.3cm 1.2cm;
        }

        .paper {
            width: 100%;
            max-width: 21cm;
            margin: 0 auto;
        }

        /* Header diperbaiki */
        .header {
            display: flex;
            gap: 15px;
            align-items: center;
            margin-bottom: 8px;
            border-bottom: 2.5px solid #000;
            padding-bottom: 8px;
        }

        .logo {
            width: 2.5cm;
            height: 2.5cm;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .school-info {
            flex: 1;
            text-align: center;
        }

        .school-info h1 {
            font-size: 13pt;
            margin-bottom: 1px;
            letter-spacing: 0.3px;
            line-height: 1.15;
            font-weight: 700;
        }

        .school-info h2 {
            font-size: 13pt;
            margin-bottom: 3px;
            margin-top: 0;
            font-weight: 700;
            line-height: 1.15;
        }

        .school-info p {
            font-size: 8pt;
            margin-top: 0;
            line-height: 1.2;
            font-style: italic;
        }

        .title {
            text-align: center;
            margin: 15px 0;
            padding: 10px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
        }

        .title h5 {
            font-size: 12pt;
            text-decoration: underline;
            margin-bottom: 5px;
            font-weight: 700;
        }

        .title p {
            font-size: 10pt;
            color: #333;
        }

        .content {
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td {
            padding: 8px 5px;
            vertical-align: top;
            font-size: 10.5pt;
        }

        .label {
            width: 35%;
            font-weight: 600;
        }

        .separator {
            width: 3%;
        }

        .value {
            width: 62%;
        }

        .status-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 10pt;
        }

        .status-diterima {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .status-ditolak {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .status-diproses {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
        }

        .info-box {
            background-color: #d1ecf1;
            border: 1px solid #bee5eb;
            border-radius: 4px;
            padding: 15px;
            margin: 20px 0;
        }

        .info-box strong {
            color: #0c5460;
        }

        .notes {
            margin-top: 25px;
            padding: 15px;
            background-color: #fff3cd;
            border: 1px solid #ffeeba;
            border-radius: 4px;
        }

        .notes h6 {
            font-size: 10.5pt;
            margin-bottom: 10px;
            color: #856404;
            font-weight: 700;
        }

        .notes ul {
            margin-left: 20px;
            font-size: 9.5pt;
            color: #666;
        }

        .notes li {
            margin-bottom: 5px;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 9pt;
            color: #999;
            padding-top: 15px;
            border-top: 1px solid #ddd;
        }

        @page {
            margin: 0.3cm 1.2cm;
        }

        @media print {
            body { padding: 0; }
        }
    </style>
</head>

<body>
    <div class="paper">
        <!-- Header with Logo -->
        <div class="header">
            <div class="logo">
                @if(file_exists(public_path('template/assets/img/logo.png')))
                    <img src="{{ public_path('template/assets/img/logo.png') }}" alt="Logo Sekolah">
                @else
                    <div style="font-size:9pt; text-align:center;">LOGO</div>
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
        <div class="title">
            <h5>BUKTI PENDAFTARAN SPMB</h5>
            <p>TAHUN PELAJARAN {{ $pendaftar->gelombang->tapel }} - {{ $pendaftar->gelombang->judul }}</p>
        </div>

        <!-- Content -->
        <div class="content">
            <table>
                <tr>
                    <td class="label">Sekolah</td>
                    <td class="separator">:</td>
                    <td class="value">SMK</td>
                </tr>
                <tr>
                    <td class="label">Pilihan Program</td>
                    <td class="separator">:</td>
                    <td class="value" style="font-weight: bold; text-transform: uppercase; color: #0066cc;">
                        {{ $pendaftar->jurusan }}
                    </td>
                </tr>
                <tr>
                    <td class="label">Nama Peserta</td>
                    <td class="separator">:</td>
                    <td class="value" style="font-weight: bold;">{{ $pendaftar->nama_lengkap }}</td>
                </tr>
                <tr>
                    <td class="label">Kode Unik</td>
                    <td class="separator">:</td>
                    <td class="value">{{ $pendaftar->nomor_pendaftaran }}</td>
                </tr>
                <tr>
                    <td class="label">NIK</td>
                    <td class="separator">:</td>
                    <td class="value">{{ $pendaftar->nik }}</td>
                </tr>
                <tr>
                    <td class="label">Tanggal Daftar</td>
                    <td class="separator">:</td>
                    <td class="value">{{ \Carbon\Carbon::parse($pendaftar->created_at)->format('d F Y H:i:s') }}</td>
                </tr>
                <tr>
                    <td class="label">Tanggal Tes</td>
                    <td class="separator">:</td>
                    <td class="value">-</td>
                </tr>
                <tr>
                    <td class="label">Status Pendaftaran</td>
                    <td class="separator">:</td>
                    <td class="value">
                        @if ($pendaftar->status == 'diterima')
                            <span class="status-badge status-diterima">PENDAFTARAN TELAH DITERIMA</span>
                        @elseif($pendaftar->status == 'ditolak')
                            <span class="status-badge status-ditolak">PENDAFTARAN DITOLAK</span>
                        @else
                            <span class="status-badge status-diproses">PENDAFTARAN TELAH DIPROSES</span>
                        @endif
                    </td>
                </tr>
            </table>
        </div>

        <!-- Info Box -->
        <div class="info-box">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 50%;"><strong>Email:</strong> {{ $pendaftar->email }}</td>
                    <td style="width: 50%;"><strong>No. HP:</strong> {{ $pendaftar->no_hp }}</td>
                </tr>
            </table>
        </div>

        <!-- Notes -->
        <div class="notes">
            <h6><strong>Catatan:</strong></h6>
            <ul>
                <li>Simpan bukti pendaftaran ini dengan baik</li>
                <li>Harap membawa bukti pendaftaran ini saat melakukan tes/verifikasi</li>
                <li>Download formulir pendaftaran untuk dilengkapi dan diserahkan saat verifikasi</li>
                <li>Untuk informasi lebih lanjut silakan hubungi panitia PPDB</li>
            </ul>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Dicetak pada: {{ \Carbon\Carbon::now()->format('d F Y H:i:s') }}</p>
            <p>Dokumen ini dibuat secara otomatis oleh sistem SPMB SMK Cordova</p>
        </div>
    </div>
</body>

</html>
