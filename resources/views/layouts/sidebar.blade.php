<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    @if(\Illuminate\Support\Facades\Auth::user()->Role === 'admin')
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-text mx-3">Deep Trading</div>
    </a>
    @else
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-text mx-3">Deep Trading</div>
    </a>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    @if(\Illuminate\Support\Facades\Auth::user()->Role === 'user')
    
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home_frontend') }}">
                <i class="fas fa-fw fa-home"></i>
                <span>Home</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item @if (\Route::currentRouteName() == 'home') active @endif">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <li class="nav-item @if (\Route::currentRouteName() == 'subscribe') active @endif">
            <a class="nav-link" href="{{ route('subscribe') }}">
                <i class="fas fa-fw fa-check-square"></i>
                <span>Subscribe</span>
            </a>
        </li>

        <hr class="sidebar-divider my-0">

        @if(\Illuminate\Support\Facades\Auth::user()->Subscribed == 1)
            <li class="nav-item @if (\Route::currentRouteName() == 'graph') active @endif">
                <a class="nav-link" href="{{ route('graph') }}">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Graph</span></a>
            </li>
            <hr class="sidebar-divider my-0">

            <li class="nav-item @if (\Route::currentRouteName() == 'user.history') active @endif">
                <a class="nav-link" href="{{ route('user.history') }}">
                    <i class="fas fa-fw fa-history"></i>
                    <span>History</span></a>
            </li>
        @endif
    @endif

    @if(\Illuminate\Support\Facades\Auth::user()->Role === 'admin')
        <li class="nav-item @if (\Route::currentRouteName() == 'admin.dashboard') active @endif">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Users</span></a>
        </li>
        <li class="nav-item @if (\Route::currentRouteName() == 'admin.users') active @endif">
            <a class="nav-link" href="{{ route('admin.users') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Orders</span></a>
        </li>
    @endif

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
