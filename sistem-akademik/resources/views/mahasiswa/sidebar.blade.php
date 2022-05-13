@section('sidebar')
      <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-heading">Layanan Akademik - Mahasiswa</li>

      <li class="nav-item">
        <a class="nav-link " href="{{ url('/mahasiswa') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/mahasiswa/tracking-skripsi') }}">
          <i class="bi bi-mortarboard"></i>
          <span>Tracking Skripsi</span>
        </a>
      </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/mahasiswa/rencana-studi') }}">
                <i class="bi bi-card-checklist"></i>
                <span>Rencana Studi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/mahasiswa/transkrip-nilai') }}">
                <i class="bi bi-clipboard2-pulse"></i>
                <span>Transcript Nilai</span>
            </a>
        </li>

      <li class="nav-heading">Pengaturan</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/mahasiswa/edit-profil') }}">
          <i class="bi bi-gear"></i>
          <span>Edit Profil</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/logout') }}">
          <i class="bi bi-box-arrow-in-left"></i>
          <span>Logout</span>
        </a>
      </li>
    </ul>

  </aside><!-- End Sidebar-->
@endsection
