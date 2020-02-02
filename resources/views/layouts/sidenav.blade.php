<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard.index') }}">
      <div class="sidebar-brand-text mx-3">PrinterousAPP</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    @if (Auth::user()->role_id === 1)
      <li class="nav-item">
        <a class="nav-link" href="{{ route('organization.index') }}">
          <i class="fas fa-fw fa-sitemap"></i>
          <span>Organization</span></a>
      </li>
    @endif

    @if (Auth::user()->role_id === 2)
      <li class="nav-item">
        <a class="nav-link" href="{{ route('organization.index') }}">
          <i class="fas fa-fw fa-sitemap"></i>
          <span>Organization</span></a>
      </li>
    @endif
    
    @if (Auth::user()->role_id === 3)
      <li class="nav-item">
        <a class="nav-link" href="{{ route('organization.index') }}">
          <i class="fas fa-fw fa-sitemap"></i>
          <span>Organization</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index') }}">
          <i class="fas fa-fw fa-user"></i>
          <span>PIC Management</span></a>
      </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>