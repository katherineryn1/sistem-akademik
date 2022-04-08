<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Informasi Akademik</title>
</head>
<body>
    {{-- @yield('sidebar') --}}
    @include('header')
    @include('dosen.sidebar')
    @include('dosen.tracking_skripsi_add_mhs_content')
</body>
</html>