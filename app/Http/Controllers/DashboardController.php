<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalPendaftar = Pendaftar::count();
        $pendaftarDitolak = Pendaftar::where('status', 'ditolak')->count();
        $pendaftarDiproses = Pendaftar::where('status', 'diproses')->count();
        $pendaftarDiterima = Pendaftar::where('status', 'diterima')->count();

        $statistik = DB::table('pendaftars')
            ->select('asalsekolah', DB::raw('count(*) as total'))
            ->groupBy('asalsekolah')
            ->get();

        $ditolak = $pendaftarDitolak;
        $diterima = $pendaftarDiterima;
        $menungguVerifikasi = $pendaftarDiproses;

        // Top 10 Asal Sekolah
        $sekolahs = DB::table('pendaftars')
            ->select('asalsekolah', DB::raw('COUNT(*) as total_pendaftar'))
            ->groupBy('asalsekolah')
            ->orderBy('total_pendaftar', 'DESC')
            ->limit(10)
            ->get();

        // Pendaftar per Jurusan
        $jurusanCounts = DB::table('pendaftars')
            ->select('jurusan', DB::raw('COUNT(*) as total'))
            ->groupBy('jurusan')
            ->orderBy('total', 'DESC')
            ->get();

        // Data untuk Chart.js - Pendaftaran per Bulan
        $chartData = $this->getChartData();

        return view('dashboard.index', compact(
            'totalPendaftar',
            'pendaftarDitolak',
            'pendaftarDiproses',
            'pendaftarDiterima',
            'statistik',
            'ditolak',
            'diterima',
            'menungguVerifikasi',
            'sekolahs',
            'jurusanCounts',
            'chartData'
        ));
    }

    private function getChartData()
    {
        $currentYear = date('Y');

        $bulanIndonesia = [
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'Mei',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Agu',
            9 => 'Sep',
            10 => 'Okt',
            11 => 'Nov',
            12 => 'Des'
        ];

        $pendaftaranPerBulan = DB::table('pendaftars')
            ->select(
                DB::raw('MONTH(created_at) as bulan'),
                DB::raw('COUNT(*) as jumlah')
            )
            ->whereYear('created_at', $currentYear)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('jumlah', 'bulan')
            ->toArray();

        $labels = [];
        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = $bulanIndonesia[$i];
            $data[] = $pendaftaranPerBulan[$i] ?? 0;
        }

        return [
            'labels' => $labels,
            'data' => $data
        ];
    }
}
