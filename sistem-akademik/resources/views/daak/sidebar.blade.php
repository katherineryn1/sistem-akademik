@section('sidebar')
      <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-heading">Layanan Administrasi</li>

      <li class="nav-item">
        <a class="nav-link " href="{{ url('/daak') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/daak/jadwal-kuliah') }}">
          <i class="bi bi-calendar"></i>
          <span>Jadwal Kuliah</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/daak/matakuliah-kurikulum') }}">
          <i class="bi bi-qr-code"></i>
          <span>Matakuliah & Kurikulum</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/daak/pengumuman') }}">
          <i class="bi bi-card-list"></i>
          <span>Pengumuman</span>
        </a>
      </li>

      <li class="nav-heading">Pengaturan</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/daak/mahasiswa') }}">
          <i class="bi bi-gear"></i>
          <span>Akun Mahasiswa</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/daak/dosen') }}">
            <i class="bi bi-gear"></i>
            <span>Akun Dosen</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/daak/pengguna') }}">
            <i class="bi bi-gear"></i>
            <span>Akun Pengguna</span>
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
