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
         src="{{ asset('images/default-profile.png') }}" 
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
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMahasiswa"
            aria-expanded="true" aria-controls="collapseMahasiswa">
            <i class="fas fa-fw fa-cog"></i>
            <span>Mahasiswa</span>
        </a>
        <div id="collapseMahasiswa" class="collapse" aria-labelledby="headingMahasiswa" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ url('mahasiswa') }}">Mahasiswa</a>
            </div>
        </div>
    </li>
  
    <!-- Nav Item - Dosen -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDosen"
            aria-expanded="true" aria-controls="collapseDosen">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Kelola Data Dosen</span>
        </a>
        <div id="collapseDosen" class="collapse" aria-labelledby="headingDosen" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="{{ url('dosen') }}">Dosen</a>
            </div>
        </div>
    </li>
  
    <!-- Nav Item - User -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
            aria-expanded="true" aria-controls="collapseUser">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span>
        </a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="{{ url('user') }}">User</a>
            </div>
        </div>
    </li>
  
    <!-- Nav Item - About -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAbout"
            aria-expanded="true" aria-controls="collapseAbout">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>About</span>
        </a>
        <div id="collapseAbout" class="collapse" aria-labelledby="headingAbout" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="{{ url('about') }}">About</a>
            </div>
        </div>
    </li>
  
    <!-- Nav Item - Chart -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseChart"
            aria-expanded="true" aria-controls="collapseChart">
            <i class="fas fa-fw fa-chart-bar"></i>
            <span>Chart</span>
        </a>
        <div id="collapseChart" class="collapse" aria-labelledby="headingChart" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="{{ url('chart') }}">Chart</a>
            </div>
        </div>
    </li>
  
    <!-- Nav Item - Invoice -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInvoice"
            aria-expanded="true" aria-controls="collapseInvoice">
            <i class="fas fa-fw fa-file-invoice"></i>
            <span>Invoice</span>
        </a>
        <div id="collapseInvoice" class="collapse" aria-labelledby="headingInvoice" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="{{ url('invoice') }}">Invoice</a>
            </div>
        </div>
    </li>
  
    <!-- Divider -->
    <hr class="sidebar-divider">
  
  </ul>
  