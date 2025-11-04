<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\ImageManager;
use Laravolt\Indonesia;
use Validator;
use Carbon\Carbon;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftar = Pendaftar::all();
        return view('pendaftar.main', compact('pendaftar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinsi = \Indonesia::allProvinces();
        return view('user.index', compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "jurusan" => "required",
            "nama_lengkap" => "required",
            "no_hp" => "required",
            "email" => "required",
            "jkel" => "required",
            "gol_darah" => "required",
            "nik" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required",
            "provinsi" => "required",
            "kabupaten" => "required",
            "kecamatan" => "required",
            "desa" => "required",
            "dusun" => "required",
            "alamat" => "required",
            "rt" => "required",
            "rw" => "required",
            "kodepos" => "required",
            "asalsekolah" => "required",
            "nisn" => "required",
            "rekomendasi" => "required",
            "nama_ayah" => "required",
            "pekerjaan_ayah" => "required",
            "pendidikan_ayah" => "required",
            "nama_ibu" => "required",
            "pekerjaan_ibu" => "required",
            "pendidikan_ibu" => "required",
            "nama_wali" => "required",
            "pekerjaan_wali" => "required",
            "pendidikan_wali" => "required",
            "telp_wali" => "required",
            "foto" => "required",
            "kk" => "required",
            "ktp_ortu" => "required",
            "aktalahir" => "required",
        ]);

        if ($validate->fails()) {
            return redirect()->route('pendaftar.create')->withErrors($validate)->withInput();
        }

        $gelombangAktif = Gelombang::where('is_active', 'ya')->first();

        // === Generate nomor pendaftaran otomatis ===
        $today = Carbon::now()->format('Ymd'); // contoh: 20251104
        $prefix = 'PMB' . $today; // contoh: PMB20251104

        // cari nomor terakhir hari ini
        $last = Pendaftar::where('nomor_pendaftaran', 'like', $prefix . '%')
            ->orderBy('nomor_pendaftaran', 'desc')
            ->first();

        if ($last) {
            // ambil 4 digit terakhir lalu tambahkan 1
            $lastNumber = intval(substr($last->nomor_pendaftaran, -4)) + 1;
        } else {
            $lastNumber = 1;
        }

        // format jadi 4 digit (0001, 0002, dst)
        $nomorPendaftaran = $prefix . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);

        //img interevention
        $manager = ImageManager::withDriver(new Driver());


        //read image
        $imageNameFoto = time() . '.' . $request->foto->extension();
        $imageFoto = $manager->read($request->file('foto'));
        $imageFoto->encode(new AutoEncoder(50))->save(public_path('foto/' . $imageNameFoto));

        //read image
        $imageNameKK = time() . '.' . $request->kk->extension();
        $imageKK = $manager->read($request->file('kk'));
        $imageKK->encode(new AutoEncoder(50))->save(public_path('kk/' . $imageNameKK));

        //read image
        $imageNameKtp = time() . '.' . $request->ktp_ortu->extension();
        $imageKtp = $manager->read($request->file('ktp_ortu'));
        $imageKtp->encode(new AutoEncoder(50))->save(public_path('ktp/' . $imageNameKtp));

        //read image
        $imageNameAkta = time() . '.' . $request->aktalahir->extension();
        $imageAkta = $manager->read($request->file('aktalahir'));
        $imageAkta->encode(new AutoEncoder(50))->save(public_path('akta/' . $imageNameAkta));

        $pendaftar = Pendaftar::create([
            "gelombang_id" => $gelombangAktif->id,
            "nomor_pendaftaran" => $nomorPendaftaran,
            "jurusan" => $request->jurusan,
            "nama_lengkap" => $request->nama_lengkap,
            "no_hp" => $request->no_hp,
            "email" => $request->email,
            "jkel" => $request->jkel,
            "gol_darah" => $request->gol_darah,
            "nik" => $request->nik,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "provinsi" => $request->provinsi,
            "kabupaten" => $request->kabupaten,
            "kecamatan" => $request->kecamatan,
            "desa" => $request->desa,
            "dusun" => $request->dusun,
            "alamat" => $request->alamat,
            "rt" => $request->rt,
            "rw" => $request->rw,
            "kodepos" => $request->kodepos,
            "asalsekolah" => $request->asalsekolah,
            "nisn" => $request->nisn,
            "rekomendasi" => $request->rekomendasi,
            "nama_ayah" => $request->nama_ayah,
            "pekerjaan_ayah" => $request->pekerjaan_ayah,
            "pendidikan_ayah" => $request->pendidikan_ayah,
            "nama_ibu" => $request->nama_ibu,
            "pekerjaan_ibu" => $request->pekerjaan_ibu,
            "pendidikan_ibu" => $request->pendidikan_ibu,
            "nama_wali" => $request->nama_wali,
            "pekerjaan_wali" => $request->pekerjaan_wali,
            "pendidikan_wali" => $request->pendidikan_wali,
            "telp_wali" => $request->telp_wali,
            "foto" => $imageNameFoto,
            "kk" => $imageNameKK,
            "ktp_ortu" => $imageNameKtp,
            "aktalahir" => $imageNameAkta,
        ]);


        if ($request->kip) {
            //read image
            $imageNameKip = time() . '.' . $request->kip->extension();
            $imageKip = $manager->read($request->file('kip'));
            $imageKip->encode(new AutoEncoder(50))->save(public_path('kip/' . $imageNameKip));
            $pendaftar->update([
                "kip" => $imageNameKip
            ]);
        }

        if ($request->pkh) {
            //read image
            $imageNamePkh = time() . '.' . $request->kph->extension();
            $imagePkh = $manager->read($request->file('pkh'));
            $imagePkh->encode(new AutoEncoder(50))->save(public_path('pkh/' . $imageNamePkh));
            $pendaftar->update([
                "pkh" => $imageNamePkh
            ]);
        }

        if ($request->kks) {
            //read image
            $imageNameKks = time() . '.' . $request->kks->extension();
            $imageKks = $manager->read($request->file('kks'));
            $imageKks->encode(new AutoEncoder(50))->save(public_path('kks/' . $imageNameKks));
            $pendaftar->update([
                "kks" => $imageNameKks
            ]);
        }

        return redirect()->back()->with('anda berhasil mendaftar');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
