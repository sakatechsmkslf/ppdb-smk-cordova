<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\ImageManager;
use Laravolt\Indonesia;
use Validator;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftar = Pendaftar::all();
        return view('', compact('pendaftar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinsi = Indonesia::allProvince();
        return view('', compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "nomor_pendaftaran" => "required",
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
        $imageNameKtp = time() . '.' . $request->ktp->extension();
        $imageKtp = $manager->read($request->file('ktp'));
        $imageKtp->encode(new AutoEncoder(50))->save(public_path('ktp/' . $imageNameKtp));

        //read image
        $imageNameAkta = time() . '.' . $request->akta->extension();
        $imageAkta = $manager->read($request->file('akta'));
        $imageAkta->encode(new AutoEncoder(50))->save(public_path('akta/' . $imageNameAkta));

        $pendaftar = Pendaftar::create([
            "nomor_pendaftaran" => $request->nomor_pendafataran,
            "jurusan" => $request->jurusan,
            "nama_lengkap" => $request->nama_lengkap,
            "no_hp" => $request->no_hp,
            "email" => $request->email,
            "jkel" => $request->jkel,
            "gol_darah" => $request->gol_darah,
            "nik" => $request->nik,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tangal_lahir,
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
