<?php

namespace App\Http\Controllers;

use App\Models\Gelombang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class GelombangController extends Controller
{
    public function index(Request $request)
    {
        // $user = auth()->user();
        // if (!$user->can('manage gelombang')) {
        //     return redirect()->back()->with('error', 'Anda tidak mempunya permission');
        // }

        // $data = Gelombang::latest()->get();
        // dd($data);

        if ($request->ajax()) {
            // gunakan query builder langsung, jangan ->get()
            $query = Gelombang::latest();

            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('is_active', function ($row) {
                    return $row->is_active === 'ya'
                        ? '<span class="badge bg-success">Aktif</span>'
                        : '<span class="badge bg-secondary">Tidak Aktif</span>';
                })
                ->addColumn('action', function ($row) {
                    return view('gelombang.actions', compact('row'))->render();
                })
                ->rawColumns(['action', 'is_active'])
                ->make(true);
        }

        return view('gelombang.main');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $user = auth()->user();
        // if (!$user->can('manage gelombang')) {
        //     return redirect()->back()->with('error', 'Anda tidak mempunya permission');
        // }
        //! diganti sesuai viewnya. (view ini hanya untuk kebutuhan testing tambah)
        //! jika sudah diganti maka hapus comment ini
        return view('gelombang.aksi', [
            'title' => 'Tambah Gelombang',
            'route' => 'gelombang',
            'gelombang' => null,
        ]);
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
            "is_active" => $request->is_active
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
        // $user = auth()->user();
        // if (!$user->can('manage gelombang')) {
        //     return redirect()->back()->with('error', 'Anda tidak mempunya permission');
        // }

        $gelombang = Gelombang::find($id);

        //! diganti sesuai viewnya. (view ini hanya untuk kebutuhan testing edit data)
        //! jika sudah diganti maka hapus comment ini
        return view('gelombang.aksi', compact('gelombang'), [
            'title' => 'Edit Gelombang',
            'route' => 'gelombang',
        ]);
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
        // $user = auth()->user();
        // if (!$user->can('manage gelombang')) {
        //     return redirect()->back()->with('error', 'Anda tidak mempunyai permission');
        // }
        $target = Gelombang::find($id);

        if ($target->is_active == 'ya') {
            return redirect()->back()->with('error', 'Anda tidak bisa menghapus Gelombang aktif');
        }

        $target->delete();
        return redirect()->route('gelombang.index')->with('success', 'Berhasil Hapus Gelombang');
    }
}
