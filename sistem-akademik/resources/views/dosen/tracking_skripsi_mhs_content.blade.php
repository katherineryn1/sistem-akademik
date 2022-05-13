<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tracking Skripsi</h1>
    </div>

    <ul class="progressbar">
        <li class="<?php if ( $skripsi->milestone > 0 ) { echo "active"; } ?>">Bab 1</li>
        <li class="<?php if ( $skripsi->milestone > 1 ) { echo "active"; } ?>">Bab 2</li>
        <li class="<?php if ( $skripsi->milestone > 2 ) { echo "active"; } ?>">Bab 3</li>
        <li class="<?php if ( $skripsi->milestone > 3 ) { echo "active"; } ?>">Seminar</li>
        <li class="<?php if ( $skripsi->milestone > 4 ) { echo "active"; } ?>">Bab 4</li>
        <li class="<?php if ( $skripsi->milestone > 5 ) { echo "active"; } ?>">Bab 5</li>
        <li class="<?php if ( $skripsi->milestone > 6 ) { echo "active"; } ?>">Prasidang</li>
        <li class="<?php if ( $skripsi->milestone > 7 ) { echo "active"; } ?>">Sidang</li>
    </ul>

    <div class="clear-left"></div>

    <table>
        <tr>
            <td><strong>Judul Tugas Akhir</strong></td>
            <td>: {{ $skripsi->judul }} </td>
        </tr>
        <tr>
            <td><strong>Dosen Pembimbing</strong></td>
            <td>: {{ $skripsi->nama }}</td>
        </tr>
    </table>

    <br>

    @foreach ($komentar as $k)
        <div class="bold500"> {{ $k->label }} </div>
        <strong>Komentar Dosen :</strong>
        {{ $k->komentar }}

        <div style="height: 20px"></div>
    @endforeach

    <center>
        <br>

        <a href="#" class="btn btn-outline-dark">Setujui {{ $komentar[0]->label }}</a>
        <a href="#" class="btn btn-primary" style="background-color: #33297D;">Download File Skripsi</a>
    </center>
</main>
