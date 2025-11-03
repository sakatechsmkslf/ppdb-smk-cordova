<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InformasiController extends Controller
{
    /**
     * Display the information page
     */
    public function index()
    {
        return view('user.informasi');
    }

    /**
     * Search pendaftar by NIK
     */
    public function cari(Request $request)
    {
        $request->validate([
            'nik' => 'required|digits:16'
        ], [
            'nik.required' => 'NIK wajib diisi',
            'nik.digits' => 'NIK harus 16 digit'
        ]);

        $pendaftar = Pendaftar::with('gelombang')
            ->where('nik', $request->nik)
            ->first();

        if (!$pendaftar) {
            return redirect()->back()
                ->with('error', 'Data pendaftar dengan NIK tersebut tidak ditemukan.');
        }

        return view('user.informasi', compact('pendaftar'));
    }

    /**
     * Export bukti pendaftaran to PDF
     */
    public function export($id)
    {
        $pendaftar = Pendaftar::with('gelombang')->findOrFail($id);

        $pdf = Pdf::loadView('user.pdf.bukti-pendaftaran', compact('pendaftar'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('Bukti-Pendaftaran-' . $pendaftar->nomor_pendaftaran . '.pdf');
    }

    /**
     * Download formulir pendaftaran PDF
     */
    public function formulir($id)
    {
        $pendaftar = Pendaftar::with('gelombang')->findOrFail($id);

        $pdf = Pdf::loadView('user.pdf.formulir-pendaftaran', compact('pendaftar'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('Formulir-Pendaftaran-' . $pendaftar->nama_lengkap . '.pdf');
    }

    /**
     * Print formulir pendaftaran (view only)
     */
    public function printFormulir($id)
    {
        $pendaftar = Pendaftar::with('gelombang')->findOrFail($id);

        return view('user.pdf.formulir-pendaftaran', compact('pendaftar'));
    }
}
