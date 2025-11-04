@extends('layout.main')
@section('title', 'Dada Pendaftar')

@section('main')
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Pendaftaran</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Data Pendaftaran
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Pendaftar</h3>
                            <div class="card-tools">
                                <a href="{{ route('gelombang.create') }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-plus-circle"></i> Tambah Data
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="pendaftar-table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Gelombang</th>
                                            <th>No Pendaftaran</th>
                                            <th>Jurusan</th>
                                            <th>Nama</th>
                                            <th>No HP</th>
                                            <th>Jkel</th>
                                            <th>Asal Sekolah</th>
                                            <th>Rekomendasi</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(function() {
                var table = $('#pendaftar-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('pendaftaran.index') }}',
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false, // Tambahkan ini
                            searchable: false // Tambahkan ini juga
                        },
                        {
                            data: 'gelombang',
                            name: 'gelombang.judul'
                        },
                        {
                            data: 'nomor_pendaftaran',
                            name: 'nomor_pendaftaran'
                        },
                        {
                            data: 'jurusan',
                            name: 'jurusan'
                        },
                        {
                            data: 'nama_lengkap',
                            name: 'nama_lengkap'
                        },
                        {
                            data: 'no_hp_link',
                            name: 'no_hp',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'jkel',
                            name: 'jkel'
                        },
                        {
                            data: 'asalsekolah',
                            name: 'asalsekolah'
                        },
                        {
                            data: 'rekomendasi',
                            name: 'rekomendasi'
                        },
                        {
                            data: 'keterangan_dropdown',
                            name: 'status',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });

                $(document).on('change', '.keterangan-select', function() {
                    var id = $(this).data('id');
                    var keterangan = $(this).val();

                    // AJAX update ke server
                    $.ajax({
                        url: '/update-keterangan',
                        method: 'POST',
                        data: {
                            id: id,
                            keterangan: keterangan
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
