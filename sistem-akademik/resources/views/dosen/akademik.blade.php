<main id="main" class="main">
    <div class="pagetitle">
        <h1>Akademik</h1>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="card card-body h-100">
                <h5 class="card-title">Jadwal Hari Ini - {{ $tanggalHariIni }}</h5>
                <div class="list-group">
                    <ul class="list-group">
                        @forelse($jadwalMengajar as $jadwalHarian)
                            <li class="list-group-item list-group-item-warning" style="margin-bottom: 4px;">
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="mb-1 bold500">{{ $jadwalHarian['nama'] }} </p>
                                </div>
                                <p class="mb-1">{{ $jadwalHarian['jam_mulai'] }} - {{ $jadwalHarian['jam_selesai'] }}</p>
                            </li>
                        @empty
                            <li class="list-group-item list-group-item-success" style="margin-bottom: 4px;">
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="mb-1 bold500">Tidak ada jadwal.</p>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card card-body h-100">
                <h5 class="card-title">Tracking Skripsi Terakhir</h5>
                <p class="card-text">NIM: 1118000</p>
                <p class="card-text">Nama Lengkap: Lorem Ipsum</p>
                <p class="card-text">Judul Tugas Akhir: Lorem ipsum dolor sit amet consectetur adipisicing elit
                    Perspiciatis id voluptate blanditiis debitis.</p>
                <p class="card-text">Milestone: Bab 1</p>
                <center>
                    <a href="#" class="btn btn-primary" style="background-color: #33297D;">Download File Skripsi</a>
                </center>
            </div>
        </div>
    </div>
</main>
