<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('progress-point.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-icons.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <title>Sistem Informasi Akademik</title>
</head>
<body>
      <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">SIA</span>
      </a>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="{{ url('/dosen/profil') }}" data-bs-toggle="dropdown">
            <img src="{{ asset('profile.png') }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block ps-2">John Doe</span>
          </a><!-- End Profile Iamge Icon -->
        </li><!-- End Profile Nav -->
      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->

  @yield('sidebar')
</body>
</html>