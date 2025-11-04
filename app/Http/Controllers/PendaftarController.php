<?php

namespace App\Http\Controllers;

use App\Models\AsalSekolah;
use App\Models\Gelombang;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\ImageManager;
use Laravolt\Indonesia;
use Validator;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        // if (!$user) {
        //     return redirect()->back()->with('error', 'anda tidak punya permission');
        // }
        // $pendaftar = Pendaftar::all();
        // return view('pendaftar.main', compact('pendaftar'));

        if ($request->ajax()) {
            $query = Pendaftar::with('gelombang')->select(
                'id',
                'gelombang_id',
                'nomor_pendaftaran',
                'jurusan',
                'nama_lengkap',
                'no_hp',
                'jkel',
                'asalsekolah',
                'rekomendasi',
                'status'
            );

            return DataTables::of($query)
                ->addIndexColumn()

                ->addColumn('gelombang', function ($row) {
                    return $row->gelombang->judul ?? '-';
                })

                ->addColumn('no_hp_link', function ($row) {
                    $no = preg_replace('/[^0-9]/', '', $row->no_hp);

                    if (substr($no, 0, 1) === '0') {
                        $no = '62' . substr($no, 1);
                    }

                    return '<a href="https://wa.me/' . $no . '" target="_blank" class="d-flex align-items-center">
                    <i class="bi bi-whatsapp me-1 text-success"></i>' . $row->no_hp . '
                </a>';
                })

                ->addColumn('keterangan', function ($row) {

                    $badges = [
                        'diterima' => '<span class="badge bg-success">Diterima</span>',
                        'diproses' => '<span class="badge bg-warning text-dark">Diproses</span>',
                        'ditolak' => '<span class="badge bg-danger">Ditolak</span>',
                    ];

                    $badge = $badges[$row->status] ?? '<span class="badge bg-secondary">Tidak Diketahui</span>';

                    // // Render tombol dari partial Blade
                    // $actions = view('pendaftar.actions', compact('row'))->render();

                    return '
        <div class="d-flex align-items-center gap-2">
            ' . $badge . '

        </div>
    ';
                })

                ->addColumn('actions', function ($row) {
                    return view('pendaftar.actions', compact('row'))->render();
                })

                ->rawColumns(['no_hp_link', 'keterangan', 'actions'])
                ->make(true);

        }

        return view('pendaftar.main');
    }

    public function createUser()
    {
        $provinsi = \Indonesia::allProvinces();
        $asalSekolah = AsalSekolah::all();
        return view('user.index', compact('provinsi', 'asalSekolah'));
    }

    public function storeUser(Request $request)
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
            return redirect()->route('viewUser')->withErrors($validate)->withInput();
        }

        $gelombangAktif = Gelombang::where('is_active', 'ya')->first();

        // === Generate nomor pendaftaran otomatis ===
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


        //buat sekolah:
        $dataAsalSekolah = AsalSekolah::where('nama_sekolah', 'LIKE', "%{$request->asalsekolah}%")->exists();
        if (!$dataAsalSekolah) {
            AsalSekolah::create([
                "nama_sekolah" => $request->asalsekolah
            ]);
        }

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

        return redirect()->back()->with('success', 'anda berhasil mendaftar');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinsi = \Indonesia::allProvinces();
        $asalSekolah = AsalSekolah::all();
        return view('pendaftar.tambah', compact('provinsi', 'asalSekolah'));
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
            return redirect()->route('pendaftaran.create')->withErrors($validate)->withInput()->with('error', 'ada eror');
        }

        $gelombangAktif = Gelombang::where('is_active', 'ya')->first();

        // === Generate nomor pendaftaran otomatis ===
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


        //buat sekolah:
        $dataAsalSekolah = AsalSekolah::where('nama_sekolah', 'LIKE', "%{$request->asalsekolah}%")->exists();
        if (!$dataAsalSekolah) {
            AsalSekolah::create([
                "nama_sekolah" => $request->asalsekolah
            ]);
        }

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

        return redirect()->route('pendaftaran.index')->with('success', 'anda berhasil mendaftar');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pendaftar = Pendaftar::with('gelombang')->findOrFail($id);
        return view('pendaftar.detail', compact('pendaftar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $asalSekolah = AsalSekolah::all();
        $pendaftaran = Pendaftar::with('gelombang')->find($id);
        return view('pendaftar.edit', compact('pendaftaran', 'asalSekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $target = Pendaftar::find($id);
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
        ]);

        if ($validate->fails()) {
            return redirect()->route('pendaftar.edit')->withErrors($validate)->withInput();
        }

        $gelombangAktif = Gelombang::where('is_active', 'ya')->first();

        // === Generate nomor pendaftaran otomatis ===
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
        // format jadi 4 digit (0001, 0002, dst)
        $nomorPendaftaran = $prefix . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);

        //img interevention
        $manager = ImageManager::withDriver(new Driver());

        if ($request->hasFile('foto')) {
            if ($target->foto && file_exists(public_path('foto/' . $target->foto))) {
                unlink(public_path('foto/' . $target->foto));
            }
            //read image
            $imageNameFoto = time() . '.' . $request->foto->extension();
            $imageFoto = $manager->read($request->file('foto'));
            $imageFoto->encode(new AutoEncoder(50))->save(public_path('foto/' . $imageNameFoto));
            $target->update([
                "foto" => $imageNameFoto,
            ]);
        }

        if ($request->hasFile('kk')) {
            if ($target->kk && file_exists(public_path('kk/' . $target->kk))) {
                unlink(public_path('kk/' . $target->kk));
            }
            //read image
            $imageNameKK = time() . '.' . $request->kk->extension();
            $imageKK = $manager->read($request->file('kk'));
            $imageKK->encode(new AutoEncoder(50))->save(public_path('kk/' . $imageNameKK));
            $target->update([
                "kk" => $imageNameKK,

            ]);
        }

        if ($request->hasFile('ktp_ortu')) {
            if ($target->ktp_ortu && file_exists(public_path('ktp/' . $target->ktp_ortu))) {
                unlink(public_path('kk/' . $target->ktp_ortu));
            }
            //read image
            $imageNameKtp = time() . '.' . $request->ktp_ortu->extension();
            $imageKtp = $manager->read($request->file('ktp_ortu'));
            $imageKtp->encode(new AutoEncoder(50))->save(public_path('ktp/' . $imageNameKtp));
            $target->update([
                "ktp_ortu" => $imageNameKtp,
            ]);
        }

        if ($request->hasFile('aktalahir')) {
            if ($target->aktalahir && file_exists(public_path('akta/' . $target->aktalahir))) {
                unlink(public_path('akta/' . $target->aktalahhir));
            }
            //read image
            $imageNameAkta = time() . '.' . $request->aktalahir->extension();
            $imageAkta = $manager->read($request->file('aktalahir'));
            $imageAkta->encode(new AutoEncoder(50))->save(public_path('akta/' . $imageNameAkta));
            $target->update([
                "aktalahir" => $imageNameAkta
            ]);
        }




        //buat sekolah:
        $dataAsalSekolah = AsalSekolah::where('nama_sekolah', 'LIKE', "%{$request->asalsekolah}%")->exists();
        if (!$dataAsalSekolah) {
            AsalSekolah::create([
                "nama_sekolah" => $request->asalsekolah
            ]);
        }

        $target->update([
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
        ]);


        if ($request->hasFile('kip')) {

            if ($target->kip && file_exists(public_path('kip/' . $target->kip))) {
                unlink(public_path('kip/' . $target->kip));
            }
            //read image
            $imageNameKip = time() . '.' . $request->kip->extension();
            $imageKip = $manager->read($request->file('kip'));
            $imageKip->encode(new AutoEncoder(50))->save(public_path('kip/' . $imageNameKip));
            $target->update([
                "kip" => $imageNameKip
            ]);
        }

        if ($request->hasFile('pkh')) {
            if ($target->pkh && file_exists(public_path('pkh/' . $target->pkh))) {
                unlink(public_path('pkh/' . $target->pkh));
            }
            //read image
            $imageNamePkh = time() . '.' . $request->pkh->extension();
            $imagePkh = $manager->read($request->file('pkh'));
            $imagePkh->encode(new AutoEncoder(50))->save(public_path('pkh/' . $imageNamePkh));
            $target->update([
                "pkh" => $imageNamePkh
            ]);
        }

        if ($request->hasFile('kks')) {
            if ($target->kks && file_exists(public_path('kks/' . $target->kks))) {
                unlink(public_path('kks/' . $target->kks));
            }
            //read image
            $imageNameKks = time() . '.' . $request->kks->extension();
            $imageKks = $manager->read($request->file('kks'));
            $imageKks->encode(new AutoEncoder(50))->save(public_path('kks/' . $imageNameKks));
            $target->update([
                "kks" => $imageNameKks
            ]);
        }

        return redirect()->back()->with('success', 'anda berhasil mendaftar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $user = auth()->user();
        // if (!$user->can('manage users')) {
        //     return redirect()->back()->with('error', 'Anda tidak mempunya permission');
        // }
        $target = Pendaftar::find($id);
        $target->delete();
        return redirect()->route('pendaftaran.index')->with('success', 'Berhasil Hapus User');
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'status' => 'required|in:diproses,diterima,ditolak'
            ]);

            // Cari data pendaftar berdasarkan ID
            $pendaftar = Pendaftar::findOrFail($id);

            // Update hanya kolom keterangan/status
            $pendaftar->status = $validated['status'];

            // Simpan perubahan
            $pendaftar->save();

            // Return response sukses
            return response()->json([
                'success' => true,
                'message' => 'Status pendaftar berhasil diupdate!',
                'data' => [
                    'id' => $pendaftar->id,
                    'status' => $pendaftar->status,
                    'nama' => $pendaftar->nama_lengkap
                ]
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Error validasi
            return response()->json([
                'success' => false,
                'message' => 'Data tidak valid',
                'errors' => $e->validator->errors()
            ], 422);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Data tidak ditemukan
            return response()->json([
                'success' => false,
                'message' => 'Data pendaftar tidak ditemukan'
            ], 404);

        } catch (\Exception $e) {
            // Error lainnya
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
