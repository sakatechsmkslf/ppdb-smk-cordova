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

        return view('dashboard', compact('totalPendaftar', 'pendaftaranDitolak', 'pendaftaranDiproses', 'pendaftaranDiterima'));
    }
}
