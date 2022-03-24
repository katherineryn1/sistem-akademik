<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tracking Skripsi</h1>
        <div class="float-right">
            <a href="{{ url('/dosen/tracking-skripsi-add-mhs-bimbingan') }}" class="btn btn-primary float-right" style="background-color: #33297D;">Add Mahasiswa</a>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Judul TA</th>
                <th scope="col">Komentar Terakhir</th>
                <th scope="col">Milestone</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>1118000</td>
                <td>Lorem Ipsum</td>
                <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo unde placeat accusantium velit,
                    commodi deleniti, molestiae libero delectus</td>
                <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo unde placeat accusantium velit,
                    commodi deleniti, molestiae libero delectus</td>
                <td>Bab 2</td>
                <td>
                    <a href="{{ url('/dosen/tracking-skripsi-id') }}" class="btn btn-primary" style="background-color: #33297D;">Detail</a>
                    <a href="#" class="btn btn-outline-danger">Hapus</a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>1118000</td>
                <td>Lorem Ipsum</td>
                <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo unde placeat accusantium velit,
                    commodi deleniti, molestiae libero delectus</td>
                <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo unde placeat accusantium velit,
                    commodi deleniti, molestiae libero delectus</td>
                <td>Bab 3</td>
                <td>
                    <a href="{{ url('/dosen/tracking-skripsi-id') }}" class="btn btn-primary btn-block" style="background-color: #33297D;">Detail</a>
                    <a href="#" class="btn btn-outline-danger btn-block">Hapus</a>
                </td>
            </tr>
        </tbody>
    </table>
</main>
