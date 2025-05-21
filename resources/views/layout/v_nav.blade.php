<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

  <!-- Sidebar User Info -->
<li class="nav-item text-white text-center mt-3 mb-3">
    <img class="img-profile rounded-circle mb-2" 
         src="foto_mahasiswa/profile.png" 
         style="width: 50px; height: 50px; object-fit: cover;">

    <div style="font-weight: bold;">
        {{ Auth::check() ? Auth::user()->name : 'Guest' }}
    </div>
    <div>
        Level : 
        @php
            $level = Auth::check() ? Auth::user()->level : null;
            echo match($level) {
                1 => 'Admin',
                2 => 'User',
                3 => 'Mahasiswa',
                4 => 'Dosen',
                default => '-'
            };
        @endphp
    </div>
</li>


  
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
  
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span>
        </a>
    </li>
  
    <!-- Divider -->
    <hr class="sidebar-divider">
  
    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
  
    <!-- Nav Item - Mahasiswa -->
    @if ($level == 1 || $level == 3)
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMahasiswa">
        <i class="fas fa-fw fa-cog"></i>
        <span>Mahasiswa</span>
    </a>
    <div id="collapseMahasiswa" class="collapse">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ url('dashboardmahasiswa') }}">Mahasiswa</a>
        </div>
    </div>
</li>
@endif
  
    <!-- Dosen: hanya Admin & Dosen -->
@if ($level == 1 || $level == 4)
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDosen">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Kelola Data Dosen</span>
    </a>
    <div id="collapseDosen" class="collapse">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ url('datadosen') }}">Dosen</a>
        </div>
    </div>
</li>
@endif


@if ($level == 2 || $level == 1)
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser">
        <i class="fas fa-fw fa-user"></i>
        <span>User</span>
    </a>
    <div id="collapseUser" class="collapse">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ url('dashboarduser') }}">User</a>
        </div>
    </div>
</li>
@endif

<!-- About: semua level -->
@if ($level == 1 || $level == 1)
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAbout">
        <i class="fas fa-fw fa-info-circle"></i>
        <span>About</span>
    </a>
    <div id="collapseAbout" class="collapse">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ url('about') }}">About</a>
        </div>
    </div>
</li>
@endif

<!-- Chart: Admin & Dosen -->
@if ($level == 1)
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseChart">
        <i class="fas fa-fw fa-chart-bar"></i>
        <span>Chart</span>
    </a>
    <div id="collapseChart" class="collapse">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ url('chart') }}">Chart</a>
        </div>
    </div>
</li>
@endif

<!-- Invoice: Admin & User -->
@if ($level == 1)
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInvoice">
        <i class="fas fa-fw fa-file-invoice"></i>
        <span>Invoice</span>
    </a>
    <div id="collapseInvoice" class="collapse">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ url('invoice') }}">Invoice</a>
        </div>
    </div>
</li>
@endif
  
    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-link btn btn-link text-left text-white w-100">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>
    </li>
  
  </ul>
  