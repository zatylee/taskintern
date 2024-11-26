<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">
      @auth
        {{ Auth::user()->name }}
      @endauth
    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Items -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard.staff') }}">
      <i class="fas fa-chart-line"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard.addstaff') }}">
      <i class="fas fa-users"></i>
      <span>Add Staff</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard.viewstaff') }}">
      <i class="fas fa-user-alt"></i>
      <span>Show Staff</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('contact.index') }}">
      <i class="far fa-address-card"></i>
      <span>Contact Form</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('invite') }}">
      <i class="fas fa-user-plus"></i>
      <span>Invite Email</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('invite2') }}">
      <i class="fas fa-user-plus"></i>
      <span>Invite Email 2.0</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('formb.index') }}">
      <i class="fas fa-file-alt"></i>
      <span>Borang B</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

  <!-- Sidebar Message -->
  <!--
  <div class="sidebar-card d-none d-lg-flex">
    <img class="sidebar-card-illustration mb-2" src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/img/undraw_rocket.svg" alt="...">
    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
  </div>
  -->

</ul>
