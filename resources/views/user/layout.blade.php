<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SPMB SMK Cordova')</title>
    <link rel="icon" type="image/png" href="{{ asset('template/assets/img/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .header-bg {
            background-color: #1E40AF;
        }

        .logo {
            width: 40px;
            height: 40px;
            object-fit: cover;
        }

        /* Opsional: tambah hover supaya lebih hidup */
        header a.nav-link:hover {
            opacity: .85;
        }
    </style>
    @stack('styles')
</head>

<body>

    <header class="header-bg">
        <nav class="navbar navbar-expand-lg navbar-dark header-bg">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                    <img src="{{ asset('template/assets/img/logo.png') }}" alt="Logo" class="logo">
                    <span class="fw-bold">SPMB SMK Cordova</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('pendaftaran.create') }}">Daftar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('informasi') }}">Informasi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-4">
        <div class="container">
            @yield('main')
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

    <footer class="mt-5 py-4" style="background-color:#0f1f5c;">
        <div class="container text-center text-white">

            <div class="mb-2 fw-semibold">
                SPMB SMK Cordova
            </div>

            <small>
                © {{ date('Y') }} SMK Cordova. All rights reserved.
            </small>

            <div class="mt-3">
                <a href="{{ route('informasi') }}" class="text-white text-decoration-none me-3">Informasi</a>
                <a href="{{ route('daftar') }}" class="text-white text-decoration-none">Daftar</a>
            </div>

        </div>
    </footer>

</body>

</html>
