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
    <style>
        .form-horizontal .control-label::after{
            content:":";
            color:black;
            font-weight:bold;
            float:right;
            margin-right:10px;
        }
        a,  svg {
            display: inline-block;
            vertical-align: middle;
        }
        .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
            color: #33297D;
            background-color: white;
        }


    </style>
    <title> @yield('title') - SIA</title>
</head>
<body>
      <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">@yield('title') SIA</span>
      </a>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="{{   url($url_profile) }}" data-bs-toggle="dropdown">
            <img src="{{  $img_user }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block ps-2">{{ $currentuser  }}</span>
          </a><!-- End Profile Iamge Icon -->
        </li><!-- End Profile Nav -->
      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->
  @yield('sidebar')
  @yield('content')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
