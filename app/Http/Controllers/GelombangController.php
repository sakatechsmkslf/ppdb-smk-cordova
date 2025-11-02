<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GelombangController extends Controller
{
    public function index()
    {

        $user = auth()->user();
        if (!$user->hasAnyPermission(['manage gelombang'])) {
            return redirect()->back()->with('error', 'Anda tidak mempunya permission');
        }
        $gelombang = Gelombang::all();

        //! diganti sesuai viewnya. (view ini hanya untuk kebutuhan testing tampil data)
        //! jika sudah diganti maka hapus comment ini
        return view('gelombang.main', compact('gelombang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        if (!$user->can('manage gelombang')) {
            return redirect()->back()->with('error', 'Anda tidak mempunya permission');
        }
        //! diganti sesuai viewnya. (view ini hanya untuk kebutuhan testing tambah)
        //! jika sudah diganti maka hapus comment ini
        return view('gelombang.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "tapel" => "required",
            "judul" => "required",
            "is_active" => "required",
        ]);

        if ($validate->fails()) {
            return redirect()->route('gelombang.create')->withErrors($validate)->withInput();
        }

        $gelombangAktif = Gelombang::where('is_active', 'ya')->first();

        if ($gelombangAktif) {
            Gelombang::where('is_active', 'ya')->update(['is_active' => 'tidak']);
        }

        Gelombang::create([
            "tapel" => $request->tapel,
            "judul" => $request->judul,
            "is_active" => "aktif"
        ]);

        return redirect()->route('gelombang.index')->with('success', 'Berhasil Tambah Gelombang');
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
        $user = auth()->user();
        if (!$user->can('manage gelombang')) {
            return redirect()->back()->with('error', 'Anda tidak mempunya permission');
        }

        $gelombang = Gelombang::find($id);

        //! diganti sesuai viewnya. (view ini hanya untuk kebutuhan testing edit data)
        //! jika sudah diganti maka hapus comment ini
        return view('gelombang.edit', compact('gelombang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $target = Gelombang::find($id);

        $validate = Validator::make($request->all(), [
            "tapel" => "required",
            "judul" => "required",
            "is_active" => "required",
        ]);

        if ($validate->fails()) {
            return redirect()->route('instansi.create', $id)->withErrors($validate)->withInput();
        }

        if ($request->is_active == "ya" && Gelombang::where('is_active', "ya")->where('id', '!=', $id)->exists()) {
            return redirect()->back()->with('error', "Gelombang yang aktif tidak boleh lebih dari satu");
        }

        $target->update([
            "tapel" => $request->tapel,
            "judul" => $request->judul,
            "is_active" => $request->is_active
        ]);

        return redirect()->route('gelombang.index')->with('success', 'Berhasil Update Gelombang PPDB');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = auth()->user();
        if (!$user->can('manage gelombang')) {
            return redirect()->back()->with('error', 'Anda tidak mempunyai permission');
        }
        $target = Gelombang::find($id);

        if ($target->is_active == 'ya') {
            return redirect()->back()->with('error', 'Anda tidak bisa menghapus Gelombang aktif');
        }

        $target->delete();
        return redirect()->route('Gelombang.index')->with('success', 'Berhasil Hapus Gelombang');
    }
}
