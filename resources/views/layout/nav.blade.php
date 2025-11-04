<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
            <i class="bi bi-list"></i>
        </a>
    </li>
    <li class="nav-item d-none d-md-block"><a href="{{ route('dashboard') }}" class="nav-link">Home</a></li>
</ul>

<ul class="navbar-nav ms-auto">
    <!--begin::User Menu Dropdown-->
    <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <span class="d-none d-md-inline">Admin</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
            <li class="user-footer">
                <a href="#" id="btnLogout" class="btn btn-default btn-flat float-end">Log Out</a>
            </li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</ul>
