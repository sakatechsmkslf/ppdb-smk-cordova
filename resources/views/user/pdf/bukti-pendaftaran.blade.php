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
            padding: 30px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 3px double #000;
        }

        .header img {
            height: 80px;
            margin-bottom: 10px;
        }

        .header h4 {
            font-size: 14pt;
            margin: 5px 0;
        }

        .header h5 {
            font-size: 13pt;
            color: #0066cc;
            margin: 5px 0;
        }

        .header p {
            font-size: 9pt;
            color: #666;
        }

        .title {
            text-align: center;
            margin: 20px 0;
        }

        .title h5 {
            font-size: 12pt;
            text-decoration: underline;
            margin-bottom: 5px;
        }

        .title p {
            font-size: 10pt;
        }

        .content {
            margin: 30px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td {
            padding: 8px 5px;
            vertical-align: top;
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
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
        }

        .notes h6 {
            font-size: 10pt;
            margin-bottom: 8px;
        }

        .notes ul {
            margin-left: 20px;
            font-size: 9pt;
            color: #666;
        }

        .notes li {
            margin-bottom: 5px;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 9pt;
            color: #999;
        }

        @page {
            margin: 2cm;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <h1>YAYASAN AL - ZAHRA HAJAIN</h1>
        <h2>SMK CORDOVA MARGOYOSO</h2>
        <p>NSM 402031816024 / NPSN 20341574<br>
            Jalan Polgarut Selatan - Kajen - Margoyoso Kecamatan Margoyoso, Kabupaten Pati - Jawa Tengah
        </p>
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
</body>

</html>
