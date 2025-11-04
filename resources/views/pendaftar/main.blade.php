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
                                <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary btn-sm">
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
                                            <th>Status</th>
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
                            data: 'keterangan',
                            name: 'keterangan',
                            // orderable: false,
                            // searchable: false
                        },


                        {
                            data: 'actions',
                            name: 'actions',
                            orderable: false,
                            searchable: false
                        },

                    ]
                });
            });
        </script>
    @endpush

    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="statusModalLabel">
                        <i class="bi bi-pencil-square"></i> Update Status Pendaftar
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Nama Pendaftar -->
                    <div class="alert alert-info mb-3">
                        <strong>Nama Pendaftar:</strong>
                        <div id="modal-nama-pendaftar" class="mt-1">-</div>
                    </div>

                    <!-- Pilihan Status -->
                    <div class="mb-3">
                        <label for="status-select" class="form-label fw-bold">
                            Status <span class="text-danger">*</span>
                        </label>
                        <select class="form-select" id="status-select" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="diproses">Diproses</option>
                            <option value="diterima">Diterima</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                    </div>
                    <!-- Hidden Input untuk ID -->
                    <input type="hidden" id="pendaftar-id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Batal
                    </button>
                    <button type="button" class="btn btn-primary" id="btn-update-status">
                        <i class="bi bi-check-circle"></i> Update Status
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection



@push('script')
    <script>
        $(document).ready(function() {

            // ===== Ketika button edit status diklik =====
            $(document).on('click', '.edit-status-btn', function() {
                const id = $(this).data('id');
                const nama = $(this).data('nama');
                const status = $(this).data('status');

                // Isi data ke modal
                $('#pendaftar-id').val(id);
                $('#modal-nama-pendaftar').text(nama);
                $('#status-select').val(status);
                $('#catatan').val('');
            });

            // ===== Ketika tombol Update Status diklik =====
            $('#btn-update-status').on('click', function() {
                const id = $('#pendaftar-id').val();
                const status = $('#status-select').val();
                const catatan = $('#catatan').val();

                // Validasi
                if (!status) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Peringatan',
                        text: 'Silakan pilih status terlebih dahulu!'
                    });
                    return;
                }

                // Konfirmasi
                Swal.fire({
                    title: 'Konfirmasi Update Status',
                    text: 'Apakah Anda yakin ingin mengubah status pendaftar ini?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Update!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Kirim AJAX Request
                        $.ajax({
                            url: `/pendaftaran/${id}/update-status`, // Sesuaikan dengan route Anda
                            method: 'POST',
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                status: status,
                                catatan: catatan
                            },
                            beforeSend: function() {
                                // Disable button & tampilkan loading
                                $('#btn-update-status').prop('disabled', true).html(
                                    '<span class="spinner-border spinner-border-sm me-1"></span> Loading...'
                                );
                            },
                            success: function(response) {
                                // Tutup modal
                                $('#statusModal').modal('hide');

                                // Tampilkan pesan sukses
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: response.message ||
                                        'Status berhasil diupdate',
                                    timer: 2000,
                                    showConfirmButton: false
                                });

                                // Reload DataTable tanpa reset pagination
                                $('#myTable').DataTable().ajax.reload(null, false);
                            },
                            error: function(xhr) {
                                let errorMsg =
                                    'Terjadi kesalahan saat mengupdate status';

                                if (xhr.responseJSON && xhr.responseJSON.message) {
                                    errorMsg = xhr.responseJSON.message;
                                }

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: errorMsg
                                });
                            },
                            complete: function() {
                                // Enable button kembali
                                $('#btn-update-status').prop('disabled', false).html(
                                    '<i class="bi bi-check-circle"></i> Update Status'
                                );
                            }
                        });
                    }
                });
            });

            // ===== Reset modal ketika ditutup =====
            $('#statusModal').on('hidden.bs.modal', function() {
                $('#status-select').val('');
                $('#catatan').val('');
                $('#modal-nama-pendaftar').text('-');
                $('#pendaftar-id').val('');
            });
        });
    </script>
@endpush
