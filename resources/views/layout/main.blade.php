<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    @include('layout.header')
    @include('layout.style')
</head>

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">

    <div id="preloader">
        <div class="spinner"></div>
    </div>

    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Start Navbar Links-->
                @include('layout.nav')
                <!--end::Container-->
            </div>
        </nav>
        <!--end::Header-->
        <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <!--begin::Sidebar Brand-->
            @include('layout.sidebar')
            <!--end::Sidebar Wrapper-->
        </aside>
        <!--end::Sidebar-->
        <!--begin::App Main-->
        <main class="app-main">
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
                    @yield('main')
                </div>
            </div>
        </main>
        <!--end::App Main-->
        <!--begin::Footer-->
        <footer class="app-footer">
            @include('layout.footer')
        </footer>
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    @include('layout.script')

</body>

</html>
