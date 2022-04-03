@extends('header')

@section('sidebar')
      <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-heading">Layanan Akademik</li>

      <li class="nav-item">
        <a class="nav-link " href="{{ url('/') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href=#>
          <i class="bi bi-calendar"></i>
          <span>Jadwal Mengajar</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/dosen/absensi') }}">
          <i class="bi bi-qr-code"></i>
          <span>Presensi Kelas</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/dosen/nilai-mahasiswa') }}">
          <i class="bi bi-card-list"></i>
          <span>Nilai Mahasiswa</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/dosen/tracking-skripsi') }}">
          <i class="bi bi-mortarboard"></i>
          <span>Tracking Skripsi</span>
        </a>
      </li>

      <li class="nav-heading">Pengaturan</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/edit-profil') }}">
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