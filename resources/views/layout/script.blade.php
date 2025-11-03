 <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
     crossorigin="anonymous"></script>
 <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous">
 </script>
 <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
 <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
 <script src="{{ asset('template/js/adminlte.js') }}"></script>
 <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
 <script>
     const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
     const Default = {
         scrollbarTheme: 'os-theme-light',
         scrollbarAutoHide: 'leave',
         scrollbarClickScroll: true,
     };
     document.addEventListener('DOMContentLoaded', function() {
         const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
         if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
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

 {{-- ALERT  --}}
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <script>
     document.addEventListener('DOMContentLoaded', function() {
         const logoutBtn = document.getElementById('btnLogout');

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
     });
 </script>

 {{-- loading --}}
 <script>
     window.onload = function() {
         document.getElementById("preloader").style.display = "none";
     };
 </script>
 {{-- end loading --}}
