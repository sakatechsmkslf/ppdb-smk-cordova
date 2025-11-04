{{-- 1. JQUERY HARUS PALING PERTAMA --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- 2. POPPER.JS --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous">
</script>

{{-- 3. BOOTSTRAP --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

{{-- 4. OVERLAY SCROLLBARS --}}
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
    crossorigin="anonymous"></script>

{{-- 5. ADMINLTE (hanya 1x, hapus yang duplikat) --}}
<script src="{{ asset('template/js/adminlte.js') }}"></script>

{{-- 6. DATATABLES --}}
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

{{-- 7. SWEETALERT2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- 8. CUSTOM SCRIPTS --}}
<script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
    };

    document.addEventListener('DOMContentLoaded', function() {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal !== 'undefined' && OverlayScrollbarsGlobal
            .OverlayScrollbars) {
            OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                scrollbars: {
                    theme: Default.scrollbarTheme,
                    autoHide: Default.scrollbarAutoHide,
                    clickScroll: Default.scrollbarClickScroll,
                },
            });
        }
    });
</script>

{{-- LOGOUT ALERT --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const logoutBtn = document.getElementById('btnLogout');

        if (logoutBtn) {
            logoutBtn.addEventListener('click', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Keluar dari akun?',
                    text: 'Anda akan kembali ke halaman login.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Keluar',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('logout-form').submit();
                    }
                });
            });
        }
    });
</script>

{{-- PRELOADER --}}
<script>
    window.addEventListener('load', function() {
        const preloader = document.getElementById("preloader");
        if (preloader) {
            preloader.style.display = "none";
        }
    });
</script>
<!-- ... konten layout Anda ... -->

<!-- Tempatkan skrip notifikasi di sini -->
@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000, // Notifikasi akan hilang setelah 3 detik
                toast: true,
                position: 'top-end'
            });
        });
    </script>
@endif

@if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK',
                confirmButtonColor: '#dc3545'
            });
        });
    </script>
@endif

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var errorMessages = '';
            @foreach ($errors->all() as $error)
                errorMessages += '{{ $error }}\n';
            @endforeach

            Swal.fire({
                icon: 'warning',
                title: 'Terjadi Kesalahan!',
                text: errorMessages.trim(),
                confirmButtonText: 'Perbaiki',
                confirmButtonColor: '#ffc107'
            });
        });
    </script>
@endif

