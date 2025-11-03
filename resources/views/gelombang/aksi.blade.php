@extends('layout.main')
@section('title', 'Gelombang PPDB')

@section('main')
    <div class="col-lg-12">
        <div class="card mb-4 shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ request()->routeIs('*.edit') ? 'Edit' : 'Tambah' }} Gelombang
                </h6>
            </div>

            <div class="card-body">
                <form method="POST"
                    action="{{ isset($gelombang) ? route('gelombang.update', ['gelombang' => $gelombang->id]) : route('gelombang.store') }}">
                    @csrf
                    @if (isset($gelombang))
                        @method('PUT')
                    @endif

                    <div class="row">

                        {{-- TAPEL --}}
                        <div class="col-12 mb-3">
                            <label class="form-label">Tahun Pelajaran</label>
                            <input type="text" name="tapel" class="form-control @error('tapel') is-invalid @enderror"
                                placeholder="Contoh 2025/2026" value="{{ old('tapel', @$gelombang->tapel) }}">
                            @error('tapel')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- JUDUL --}}
                        <div class="col-12 mb-3">
                            <label class="form-label">Judul Gelombang</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                                placeholder="Contoh Gelombang 1" value="{{ old('judul', @$gelombang->judul) }}">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- STATUS AKTIF --}}
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Status</label>
                            <select name="is_active" class="form-select @error('is_active') is-invalid @enderror" required>
                                <option selected disabled value="">Pilih status...</option>
                                <option value="ya"
                                    {{ old('is_active', @$gelombang->is_active) == 'ya' ? 'selected' : '' }}>
                                    Aktif</option>
                                <option value="tidak"
                                    {{ old('is_active', @$gelombang->is_active) == 'tidak' ? 'selected' : '' }}>Tidak Aktif
                                </option>
                            </select>

                            @error('is_active')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>

                        <a href="{{ route('gelombang.index') }}" class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
