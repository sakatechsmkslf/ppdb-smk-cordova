@extends('layout.main')

@section('title', 'Dashboard')
@section('main')
    <div class="row">
        <!-- Total Pendaftar -->
        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-primary">
                <div class="inner">
                    <h3>{{ $totalPendaftar ?? 0 }}</h3>
                    <p>Total Pendaftar</p>
                </div>
                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 12c2.761 0 5-2.239 5-5S14.761 2 12 2 7 4.239 7 7s2.239 5 5 5zm0 2c-3.866
                        0-7 3.134-7 7a1 1 0 001 1h12a1 1 0 001-1c0-3.866-3.134-7-7-7z" />
                </svg>
                <a href="" class="small-box-footer text-decoration-none">
                    Lihat Data <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>

        <!-- Menunggu Verifikasi -->
        <div class="col-lg-3 col-6">
    <div class="small-box bg-warning text-white">
        <div class="inner">
            <h3>{{ $menungguVerifikasi ?? 0 }}</h3>
            <p>Menunggu Verifikasi</p>
        </div>
        <svg class="small-box-icon" fill="currentColor" style="opacity: 0.50;" viewBox="0 0 24 24">
            <path d="M12.773 1.529A10.5 10.5 0 0 0 12 1.5V0a12 12 0 0 1 .884.033zm3.006.675a10.5 10.5 0 0 0-1.478-.449l.329-1.464q.864.194 1.689.513zm2.055 1.065a10.5 10.5 0 0 0-.659-.405l.74-1.305a12 12 0 0 1 1.469.981l-.923 1.184a10.5 10.5 0 0 0-.627-.455zm2.751 2.685a10.5 10.5 0 0 0-.98-1.194l1.086-1.035q.609.644 1.121 1.365zm1.116 2.028a10.5 10.5 0 0 0-.321-.702l1.34-.675a12 12 0 0 1 .675 1.632l-1.425.47a10.5 10.5 0 0 0-.269-.725m.795 3.761a10.5 10.5 0 0 0-.15-1.538l1.478-.255q.15.87.174 1.755zm-.197 2.307q.075-.381.122-.765l1.49.185a12 12 0 0 1-.345 1.733l-1.446-.401q.104-.371.179-.752m-1.428 3.569q.414-.654.729-1.362l1.371.608q-.36.81-.833 1.557zm-1.446 1.808q.275-.275.525-.567l1.137.98a12 12 0 0 1-.602.648z"/>
            <path d="M12 1.5a10.5 10.5 0 1 0 7.425 17.925l1.061 1.061A12.002 12.002 0 1 1 12 0z"/>
            <path d="M11.25 4.5a.75.75 0 0 1 .75.75v7.815l4.872 2.784a.75.75 0 0 1-.744 1.302l-5.25-3A.75.75 0 0 1 10.5 13.5V5.25a.75.75 0 0 1 .75-.75"/>
        </svg>
        <a href="" class="small-box-footer text-decoration-none text-white">
            Tindak Lanjut <i class="bi bi-arrow-right-circle"></i>
        </a>
    </div>
</div>

        <!-- Diterima -->
        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-success">
                <div class="inner">
                    <h3>{{ $diterima ?? 0 }}</h3>
                    <p>Diterima</p>
                </div>
                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M10 15l-3.5-3.5a1 1 0 011.414-1.414L10
                        12.172l5.086-5.086a1 1 0 011.414 1.414L10 15z" />
                </svg>
                <a href="" class="small-box-footer text-decoration-none">
                    Detail <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>

        <!-- Ditolak -->
        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-danger">
                <div class="inner">
                    <h3>{{ $ditolak ?? 0 }}</h3>
                    <p>Ditolak</p>
                </div>
                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 10.586l4.95-4.95 1.414 1.414L13.414
                        12l4.95 4.95-1.414 1.414L12 13.414l-4.95
                        4.95-1.414-1.414L10.586 12l-4.95-4.95L7.05 5.636 12 10.586z" />
                </svg>
                <a href="" class="small-box-footer text-decoration-none">
                    Detail <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>
    </div>

@endsection
