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
                    <path
                        d="M12.773 1.529A10.5 10.5 0 0 0 12 1.5V0a12 12 0 0 1 .884.033zm3.006.675a10.5 10.5 0 0 0-1.478-.449l.329-1.464q.864.194 1.689.513zm2.055 1.065a10.5 10.5 0 0 0-.659-.405l.74-1.305a12 12 0 0 1 1.469.981l-.923 1.184a10.5 10.5 0 0 0-.627-.455zm2.751 2.685a10.5 10.5 0 0 0-.98-1.194l1.086-1.035q.609.644 1.121 1.365zm1.116 2.028a10.5 10.5 0 0 0-.321-.702l1.34-.675a12 12 0 0 1 .675 1.632l-1.425.47a10.5 10.5 0 0 0-.269-.725m.795 3.761a10.5 10.5 0 0 0-.15-1.538l1.478-.255q.15.87.174 1.755zm-.197 2.307q.075-.381.122-.765l1.49.185a12 12 0 0 1-.345 1.733l-1.446-.401q.104-.371.179-.752m-1.428 3.569q.414-.654.729-1.362l1.371.608q-.36.81-.833 1.557zm-1.446 1.808q.275-.275.525-.567l1.137.98a12 12 0 0 1-.602.648z" />
                    <path d="M12 1.5a10.5 10.5 0 1 0 7.425 17.925l1.061 1.061A12.002 12.002 0 1 1 12 0z" />
                    <path
                        d="M11.25 4.5a.75.75 0 0 1 .75.75v7.815l4.872 2.784a.75.75 0 0 1-.744 1.302l-5.25-3A.75.75 0 0 1 10.5 13.5V5.25a.75.75 0 0 1 .75-.75" />
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

{{--
@extends('layout.main')

@section('title', 'Dashboard')

@section('main')
    <!-- Row untuk Card Statistik Utama -->
    <div class="row">
        <!-- Total Pendaftar -->
        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-primary">
                <div class="inner">
                    <h3>{{ $totalPendaftar ?? 0 }}</h3>
                    <p>Total Pendaftar</p>
                </div>
                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 12c2.761 0 5-2.239 5-5S14.761 2 12 2 7 4.239 7 7s2.239 5 5 5zm0 2c-3.866 0-7 3.134-7 7a1 1 0 001 1h12a1 1 0 001-1c0-3.866-3.134-7-7-7z" />
                </svg>
                <a href="{{ route('pendaftaran.index') }}" class="small-box-footer text-decoration-none">
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
                    <path d="M12.773 1.529A10.5 10.5 0 0 0 12 1.5V0a12 12 0 0 1 .884.033zm3.006.675a10.5 10.5 0 0 0-1.478-.449l.329-1.464q.864.194 1.689.513zm2.055 1.065a10.5 10.5 0 0 0-.659-.405l.74-1.305a12 12 0 0 1 1.469.981l-.923 1.184a10.5 10.5 0 0 0-.627-.455zm2.751 2.685a10.5 10.5 0 0 0-.98-1.194l1.086-1.035q.609.644 1.121 1.365zm1.116 2.028a10.5 10.5 0 0 0-.321-.702l1.34-.675a12 12 0 0 1 .675 1.632l-1.425.47a10.5 10.5 0 0 0-.269-.725m.795 3.761a10.5 10.5 0 0 0-.15-1.538l1.478-.255q.15.87.174 1.755zm-.197 2.307q.075-.381.122-.765l1.49.185a12 12 0 0 1-.345 1.733l-1.446-.401q.104-.371.179-.752m-1.428 3.569q.414-.654.729-1.362l1.371.608q-.36.81-.833 1.557zm-1.446 1.808q.275-.275.525-.567l1.137.98a12 12 0 0 1-.602.648z" />
                    <path d="M12 1.5a10.5 10.5 0 1 0 7.425 17.925l1.061 1.061A12.002 12.002 0 1 1 12 0z" />
                    <path d="M11.25 4.5a.75.75 0 0 1 .75.75v7.815l4.872 2.784a.75.75 0 0 1-.744 1.302l-5.25-3A.75.75 0 0 1 10.5 13.5V5.25a.75.75 0 0 1 .75-.75" />
                </svg>
                <a href="{{ route('pendaftaran.index', ['status' => 'diproses']) }}" class="small-box-footer text-decoration-none text-white">
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
                    <path d="M10 15l-3.5-3.5a1 1 0 011.414-1.414L10 12.172l5.086-5.086a1 1 0 011.414 1.414L10 15z" />
                </svg>
                <a href="{{ route('pendaftaran.index', ['status' => 'diterima']) }}" class="small-box-footer text-decoration-none">
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
                    <path d="M12 10.586l4.95-4.95 1.414 1.414L13.414 12l4.95 4.95-1.414 1.414L12 13.414l-4.95 4.95-1.414-1.414L10.586 12l-4.95-4.95L7.05 5.636 12 10.586z" />
                </svg>
                <a href="{{ route('pendaftaran.index', ['status' => 'ditolak']) }}" class="small-box-footer text-decoration-none">
                    Detail <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Row untuk Card Tambahan -->
    <div class="row mt-4">
        <!-- Card Pendaftar Berdasarkan Asal Sekolah -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title m-0">
                        <i class="bi bi-building"></i> Top 10 Asal Sekolah
                    </h5>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @forelse ($sekolahs as $sekolah)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $sekolah->asalsekolah }}
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-primary rounded-pill me-2">{{ $sekolah->total_pendaftar }}</span>
                                    <div class="progress" style="width: 100px; height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: {{ ($sekolah->total_pendaftar / $sekolahs->first()->total_pendaftar) * 100 }}%;" aria-valuenow="{{ $sekolah->total_pendaftar }}" aria-valuemin="0" aria-valuemax="{{ $sekolahs->first()->total_pendaftar }}"></div>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted">Belum ada data pendaftar</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        <!-- Card Pendaftar Berdasarkan Jurusan -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title m-0">
                        <i class="bi bi-mortarboard"></i> Pendaftar per Jurusan
                    </h5>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @forelse ($jurusanCounts as $jurusan)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $jurusan->jurusan }}
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-success rounded-pill me-2">{{ $jurusan->total }}</span>
                                    <div class="progress" style="width: 100px; height: 5px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($jurusan->total / $jurusanCounts->first()->total) * 100 }}%;" aria-valuenow="{{ $jurusan->total }}" aria-valuemin="0" aria-valuemax="{{ $jurusanCounts->first()->total }}"></div>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted">Belum ada data pendaftar</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Row untuk Grafik -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title m-0">
                        <i class="bi bi-graph-up"></i> Grafik Pendaftaran Tahun {{ date('Y') }}
                    </h5>
                </div>
                <div class="card-body">
                    <canvas id="registrationChart" style="height: 250px;"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<!-- Chart.js (biasanya sudah ada di AdminLTE) -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data dari controller
        const chartLabels = @json($chartData['labels']);
        const chartDataValues = @json($chartData['data']);

        const ctx = document.getElementById('registrationChart').getContext('2d');
        const registrationChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartLabels,
                datasets: [{
                    label: 'Jumlah Pendaftar',
                    data: chartDataValues,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1 // Pastikan sumbu Y menampilkan angka bulat
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
</script>
@endpush --}}
