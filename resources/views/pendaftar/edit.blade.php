@extends('layouts.app')

@section('main')
    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            <!--begin::Breadcrumb-->
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pendaftaran.index') }}">Pendaftar</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
            <!--end::Breadcrumb-->
        </div>
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
            <form action="{{ route('pendaftaran.update', $pendaftar->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Pendaftar</h3>
                        <div class="card-tools">
                            <a href="{{ route('pendaftaran.index') }}" class="btn btn-sm btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        {{-- Informasi Pendaftaran --}}
                        <h5 class="border-bottom pb-2 mb-3 text-primary">Informasi Pendaftaran</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Nomor Pendaftaran</label>
                                <input type="text" class="form-control" value="{{ $pendaftar->nomor_pendaftaran }}" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Gelombang</label>
                                <select name="gelombang_id" class="form-select" required>
                                    @foreach($gelombang as $item)
                                        <option value="{{ $item->id }}" {{ $pendaftar->gelombang_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama_gelombang }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold">Jurusan <span class="text-danger">*</span></label>
                                <select name="jurusan" class="form-select" required>
                                    <option value="">Pilih Jurusan</option>
                                    <option value="Desain Komunikasi Visual" {{ $pendaftar->jurusan == 'Desain Komunikasi Visual' ? 'selected' : '' }}>Desain Komunikasi Visual</option>
                                    <option value="Teknologi Farmasi" {{ $pendaftar->jurusan == 'Teknologi Farmasi' ? 'selected' : '' }}>Teknologi Farmasi</option>
                                    <option value="Teknik Otomotif" {{ $pendaftar->jurusan == 'Teknik Otomotif' ? 'selected' : '' }}>Teknik Otomotif</option>
                                    <option value="Teknik Kimia Industri" {{ $pendaftar->jurusan == 'Teknik Kimia Industri' ? 'selected' : '' }}>Teknik Kimia Industri</option>
                                    <option value="Teknik Ketenagalistrikan" {{ $pendaftar->jurusan == 'Teknik Ketenagalistrikan' ? 'selected' : '' }}>Teknik Ketenagalistrikan</option>
                                </select>
                                @error('jurusan')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Data Pribadi --}}
                        <h5 class="border-bottom pb-2 mb-3 text-primary mt-4">Data Pribadi</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $pendaftar->nama_lengkap) }}" class="form-control" required>
                                @error('nama_lengkap')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">NIK <span class="text-danger">*</span></label>
                                <input type="text" name="nik" value="{{ old('nik', $pendaftar->nik) }}" class="form-control" required>
                                @error('nik')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">NISN <span class="text-danger">*</span></label>
                                <input type="text" name="nisn" value="{{ old('nisn', $pendaftar->nisn) }}" class="form-control" required>
                                @error('nisn')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select name="jkel" class="form-select" required>
                                    <option value="">Pilih</option>
                                    <option value="L" {{ $pendaftar->jkel == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ $pendaftar->jkel == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jkel')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Tempat Lahir <span class="text-danger">*</span></label>
                                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $pendaftar->tempat_lahir) }}" class="form-control" required>
                                @error('tempat_lahir')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pendaftar->tanggal_lahir) }}" class="form-control" required>
                                @error('tanggal_lahir')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Golongan Darah</label>
                                <select name="gol_darah" class="form-select">
                                    <option value="-" {{ $pendaftar->gol_darah == '-' ? 'selected' : '' }}>-</option>
                                    <option value="A" {{ $pendaftar->gol_darah == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ $pendaftar->gol_darah == 'B' ? 'selected' : '' }}>B</option>
                                    <option value="AB" {{ $pendaftar->gol_darah == 'AB' ? 'selected' : '' }}>AB</option>
                                    <option value="O" {{ $pendaftar->gol_darah == 'O' ? 'selected' : '' }}>O</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">No. HP <span class="text-danger">*</span></label>
                                <input type="text" name="no_hp" value="{{ old('no_hp', $pendaftar->no_hp) }}" class="form-control" required>
                                @error('no_hp')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" value="{{ old('email', $pendaftar->email) }}" class="form-control" required>
                                @error('email')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Alamat --}}
                        <h5 class="border-bottom pb-2 mb-3 text-primary mt-4">Alamat</h5>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold">Alamat Lengkap <span class="text-danger">*</span></label>
                                <textarea name="alamat" rows="2" class="form-control" required>{{ old('alamat', $pendaftar->alamat) }}</textarea>
                                @error('alamat')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label fw-bold">RT <span class="text-danger">*</span></label>
                                <input type="text" name="rt" value="{{ old('rt', $pendaftar->rt) }}" class="form-control" required>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label fw-bold">RW <span class="text-danger">*</span></label>
                                <input type="text" name="rw" value="{{ old('rw', $pendaftar->rw) }}" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Dusun</label>
                                <input type="text" name="dusun" value="{{ old('dusun', $pendaftar->dusun) }}" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Desa/Kelurahan <span class="text-danger">*</span></label>
                                <input type="text" name="desa" value="{{ old('desa', $pendaftar->desa) }}" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Kecamatan <span class="text-danger">*</span></label>
                                <input type="text" name="kecamatan" value="{{ old('kecamatan', $pendaftar->kecamatan) }}" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Kabupaten/Kota <span class="text-danger">*</span></label>
                                <input type="text" name="kabupaten" value="{{ old('kabupaten', $pendaftar->kabupaten) }}" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Provinsi <span class="text-danger">*</span></label>
                                <input type="text" name="provinsi" value="{{ old('provinsi', $pendaftar->provinsi) }}" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Kode Pos</label>
                                <input type="text" name="kodepos" value="{{ old('kodepos', $pendaftar->kodepos) }}" class="form-control">
                            </div>
                        </div>

                        {{-- Pendidikan --}}
                        <h5 class="border-bottom pb-2 mb-3 text-primary mt-4">Data Pendidikan</h5>
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label class="form-label fw-bold">Asal Sekolah <span class="text-danger">*</span></label>
                                <input type="text" name="asalsekolah" value="{{ old('asalsekolah', $pendaftar->asalsekolah) }}" class="form-control" required>
                                @error('asalsekolah')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Rekomendasi <span class="text-danger">*</span></label>
                                <input type="text" name="rekomendasi" value="{{ old('rekomendasi', $pendaftar->rekomendasi) }}" class="form-control" required>
                                @error('rekomendasi')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Data Orang Tua --}}
                        <h5 class="border-bottom pb-2 mb-3 text-primary mt-4">Data Orang Tua</h5>
                        <div class="row">
                            {{-- Ayah --}}
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Nama Ayah <span class="text-danger">*</span></label>
                                <input type="text" name="nama_ayah" value="{{ old('nama_ayah', $pendaftar->nama_ayah) }}" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Pekerjaan Ayah <span class="text-danger">*</span></label>
                                <input type="text" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah', $pendaftar->pekerjaan_ayah) }}" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Pendidikan Ayah <span class="text-danger">*</span></label>
                                <input type="text" name="pendidikan_ayah" value="{{ old('pendidikan_ayah', $pendaftar->pendidikan_ayah) }}" class="form-control" required>
                            </div>

                            {{-- Ibu --}}
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Nama Ibu <span class="text-danger">*</span></label>
                                <input type="text" name="nama_ibu" value="{{ old('nama_ibu', $pendaftar->nama_ibu) }}" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Pekerjaan Ibu <span class="text-danger">*</span></label>
                                <input type="text" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu', $pendaftar->pekerjaan_ibu) }}" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">Pendidikan Ibu <span class="text-danger">*</span></label>
                                <input type="text" name="pendidikan_ibu" value="{{ old('pendidikan_ibu', $pendaftar->pendidikan_ibu) }}" class="form-control" required>
                            </div>

                            {{-- Wali --}}
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Nama Wali</label>
                                <input type="text" name="nama_wali" value="{{ old('nama_wali', $pendaftar->nama_wali) }}" class="form-control">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Pekerjaan Wali</label>
                                <input type="text" name="pekerjaan_wali" value="{{ old('pekerjaan_wali', $pendaftar->pekerjaan_wali) }}" class="form-control">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Pendidikan Wali</label>
                                <input type="text" name="pendidikan_wali" value="{{ old('pendidikan_wali', $pendaftar->pendidikan_wali) }}" class="form-control">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Telp Wali</label>
                                <input type="text" name="telp_wali" value="{{ old('telp_wali', $pendaftar->telp_wali) }}" class="form-control">
                            </div>
                        </div>

                        {{-- Upload Dokumen --}}
                        <h5 class="border-bottom pb-2 mb-3 text-primary mt-4">Dokumen Pendukung</h5>
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle"></i> Kosongkan jika tidak ingin mengubah dokumen. Format: JPG, PNG, JPEG. Max: 1MB
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Foto</label>
                                <input type="file" name="foto" class="form-control" accept="image/*">
                                <small class="text-muted">File saat ini: {{ $pendaftar->foto }}</small>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Kartu Keluarga</label>
                                <input type="file" name="kk" class="form-control" accept="image/*">
                                <small class="text-muted">File saat ini: {{ $pendaftar->kk }}</small>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">KTP Orang Tua</label>
                                <input type="file" name="ktp_ortu" class="form-control" accept="image/*">
                                <small class="text-muted">File saat ini: {{ $pendaftar->ktp_ortu }}</small>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold">Akta Lahir</label>
                                <input type="file" name="aktalahir" class="form-control" accept="image/*">
                                <small class="text-muted">File saat ini: {{ $pendaftar->aktalahir }}</small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">KIP (Opsional)</label>
                                <input type="file" name="kip" class="form-control" accept="image/*">
                                @if($pendaftar->kip)
                                    <small class="text-muted">File saat ini: {{ $pendaftar->kip }}</small>
                                @endif
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">PKH (Opsional)</label>
                                <input type="file" name="pkh" class="form-control" accept="image/*">
                                @if($pendaftar->pkh)
                                    <small class="text-muted">File saat ini: {{ $pendaftar->pkh }}</small>
                                @endif
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">KKS (Opsional)</label>
                                <input type="file" name="kks" class="form-control" accept="image/*">
                                @if($pendaftar->kks)
                                    <small class="text-muted">File saat ini: {{ $pendaftar->kks }}</small>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--end::Row-->
@endsection

@push('script')
<script>
    // Konfirmasi sebelum submit
    $('form').on('submit', function(e) {
        e.preventDefault();
        const form = this;

        Swal.fire({
            title: 'Simpan Perubahan?',
            text: 'Data pendaftar akan diupdate',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#0d6efd',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
</script>
@endpush
