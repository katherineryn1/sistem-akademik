<main id="main" class="main container" style="width: auto;">
    <div class="pagetitle">
        <h3 style="color: #33297D; font-weight: bold;">Profil</h3>
    </div>

    <div class="card" style="padding: 5px;">
        <div class="d-flex align-items-center flex-column">
            <div class="col-sm-6" style="text-align: center;">
                <img src="https://i.pinimg.com/originals/60/c1/4a/60c14a43fb4745795b3b358868517e79.png"
                class="rounded-circle" style="max-width: 300px; max-height: 300px;" />
            </div>

            <div class="col-sm-6" style="max-width: 500px;">
                <table class="table table-borderless">
                    <tr>
                        <td class="col-sm-5" style="border: none;">NIK</td>
                        <td class="col-sm-1" style="border: none;">:</td>
                        <td id="nik" class="col-sm-6" style="border: none;"> {{ $profil->nik }} </td>
                    </tr>
                    <tr>
                        <td class="col-sm-5" style="border: none;">Nama Lengkap</td>
                        <td class="col-sm-1" style="border: none;">:</td>
                        <td id="nama_lengkap" class="col-sm-6" style="border: none;"> {{ $profil->nama }} </td>
                    </tr>
                    <tr>
                        <td class="col-sm-5" style="border: none;">Dosen Jurusan</td>
                        <td class="col-sm-1" style="border: none;">:</td>
                        <td id="dosen_jurusan" class="col-sm-6" style="border: none;"> {{ $profil->program_studi }} </td>
                    </tr>
                    <tr>
                        <td class="col-sm-5" style="border: none;">Tempat Lahir</td>
                        <td class="col-sm-1" style="border: none;">:</td>
                        <td id="tempat_lahir" class="col-sm-6" style="border: none;"> {{ $profil->tempat_lahir }} </td>
                    </tr>
                    <tr>
                        <td class="col-sm-5" style="border: none;">Tanggal Lahir</td>
                        <td class="col-sm-1" style="border: none;">:</td>
                        <td id="tanggal_lahir" class="col-sm-6" style="border: none;"> {{ $profil->tanggal_lahir }} </td>
                    </tr>
                    <tr>
                        <td class="col-sm-5" style="border: none;">Jenis Kelamin</td>
                        <td class="col-sm-1" style="border: none;">:</td>
                        <td id="jenis_kelamin" class="col-sm-6" style="border: none;">
                            @if ($profil->jenis_kelamin == 1)
                                Laki-laki
                            @else
                                Perempuan
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-5" style="border: none;">Email</td>
                        <td class="col-sm-1" style="border: none;">:</td>
                        <td id="email" class="col-sm-6" style="border: none;"> {{ $profil->email }} </td>
                    </tr>
                    <tr>
                        <td class="col-sm-5" style="border: none;">Nomor Telepon</td>
                        <td class="col-sm-1" style="border: none;">:</td>
                        <td id="nomor_telepon" class="col-sm-6" style="border: none;"> {{ $profil->no_telepon }} </td>
                    </tr>
                </table>
            </div>

            <a class="btn btn-primary" href="{{route('edit-profil')}}"
                style="background-color: white; border: solid 1px #E12A2A; color: black; margin-bottom: 10px;">
                <b>Ubah Email dan Password</b></a>
        </div>
    </div>
</main>
