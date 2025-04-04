<!-- Spinner Start -->
<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->



<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="{{ route('dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">VictoryFields</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ Auth::user()->photo ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkq65qDKJziZKpNSyjRv0RtWQg5k0um-yn7Q&s' }}" alt="User Avatar" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                <span class="text-muted small">{{ ucfirst(Auth::user()->role) }}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('dashboard') }}" class="nav-item nav-link {{ request()->routeIs('admin.dashboard.*') ? 'active' : '' }}">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>
            
            <a href="{{ route('admin.users.index') }}" class="nav-item nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="fa fa-users me-2"></i>Users
            </a>
            
             <a href="{{ route('admin.admins.index') }}" class="nav-item nav-link {{ request()->routeIs('admin.admins.*') ? 'active' : '' }}">
                <i class="fa fa-user-shield me-2"></i>Admins
            </a>
            
            <a href="{{ route('admin.sports.index') }}" class="nav-item nav-link {{ request()->routeIs('admin.sports.*') ? 'active' : '' }}">
                <i class="fa fa-futbol me-2"></i>Sports
            </a>


            <a href="{{ route('admin.news.index') }}" class="nav-item nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                <i class="fas fa-newspaper me-2"></i>News
            </a>
            
            <a href="{{ route('admin.reservations.index') }}" class="nav-item nav-link {{ request()->routeIs('admin.reservations.*') ? 'active' : '' }}">
                <i class="fas fa-calendar-check me-2"></i>Reservations

            
                <a href="{{ route('admin.fields.index') }}" class="nav-item nav-link {{ request()->routeIs('admin.fields.*') ? 'active' : '' }}">
                    <i class="fa fa-futbol me-2"></i>Fields
                </a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
