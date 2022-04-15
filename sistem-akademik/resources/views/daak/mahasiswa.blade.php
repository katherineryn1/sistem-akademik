@extends('layouts.app')
@section('title', $page_title)

@section('sidebar')
    @include('daak.sidebar')
@endsection
@section('content')
    <main id="main" class="main">
        <div id="alertsSection">
            @include('layouts.errors-msg')
        </div>
        <div class="pagetitle">
            <h1>Konfigurasi Akun Mahasiswa</h1>
        </div>

        <div class="card" style="max-width: 35rem;">
            <div class="card-body">
                <div class="row mb-3 form-horizontal">
                    <label for="inputFilterJurusan" class="col-sm-3 col-form-label control-label">Jurusan</label>
                    <div class="col-sm-9">
                        <select onchange="filterRedirect(this,'/daak/mahasiswa?jurusan=')" id="inputFilterJurusan" class="form-select">
                            <option selected="">--Pilih Jurusan--</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 class="col card-title align-self-center">Data Mahasiswa</h5>
                    <div class="col text-end align-self-center">
                        <a href="#" class="btn btn-primary">Tambah Mahasiswa</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <!-- Table with hoverable rows -->
                    <table class="table table-hover align-middle" id="tableData">
                        <thead>
                        <tr>
                            <th scope="col">Nomor Induk</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Tahun Masuk</th>
                            <th scope="col">Tahun Lulus</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $mahasiswa)
                            <tr>
                                <th scope="row">{{ $mahasiswa['id'] }}</th>
                                <td>{{ $mahasiswa['nama'] }}</td>
                                <td>{{ $mahasiswa['type'] }}</td>
                                <td>{{ $mahasiswa['age'] }}</td>
                                <td>{{ $mahasiswa['dummy']}}</td>
                                <td>{{ $mahasiswa['dummy']}}</td>
                                <td>{{ $mahasiswa['dummy']}}</td>
                                <td>{{ $mahasiswa['dummy']}}</td>
                                <td>
                                    <a href="{{ url("/daak/pengguna/{$mahasiswa['id']}/edit") }}" class="btn btn-warning" >
                                        <i width="1rem" height="1rem" fill="currentColor" class="bi bi-pencil-square"></i>
                                    </a>
                                    <button onclick="modalConfirmDeletion({{ $mahasiswa['id'] }})" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirmation-delete">
                                        <i width="1rem" height="1rem" fill="currentColor" class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with hoverable rows -->
                    <div id="pageNavPosition" class="pager-nav d-flex justify-content-center">
                    </div>
                    <script>
                        let pager = new Pager('tableData', 10);
                        pager.init();
                        pager.showPageNav('pager', 'pageNavPosition');
                        pager.showPage(1);
                    </script>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Mahasiswa</h5>

                <!-- Horizontal Form -->
                <form action=""  method="post" enctype='multipart/form-data'>
                    <div class="row mb-3 form-horizontal">
                        <h5 class="card-subtitle mb-2 text-muted">Form Pengguna</h5>
                        <hr>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputNomorInduk" class="col-sm-2 col-form-label control-label">Nomor Induk</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputNomorInduk" name="inputNomorInduk" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputNama" class="col-sm-2 col-form-label control-label">Nama</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputNama" name="inputNama" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputEmail" class="col-sm-2 col-form-label control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" name="inputEmail" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputPassword" class="col-sm-2 col-form-label control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" name="inputPassword" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputTanggalLahir" class="col-sm-2 col-form-label control-label">Tanggal Lahir</label>
                        <div class="col-sm-10 ">
                            <input type="date" class="form-control" id="inputTanggalLahir" name="inputTanggalLahir" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputTempatLahir" class="col-sm-2 col-form-label control-label">Tempat Lahir</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputTempatLahir" name="inputTempatLahir" required>
                        </div>
                    </div>
                    <fieldset class="row mb-3 form-horizontal">
                        <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                        <div class="col-sm-10">
                            <div class="col-3">
                                <input class="form-check-input" type="radio" name="inputJenisKelamin" id="inputJKPria" value="Pria">
                                <label class="form-check-label" for="inputJKPria">
                                    Pria
                                </label>
                            </div>
                            <div class="col-3">
                                <input class="form-check-input" type="radio" name="inputJenisKelamin" id="inputJKWanita" value="Wanita">
                                <label class="form-check-label" for="inputJKWanita">
                                    Wanita
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputAlamat" class="col-sm-2 col-form-label control-label">Alamat</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputAlamat" name="inputAlamat" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputNoTelp" class="col-sm-2 col-form-label control-label">Nomor Telepon</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputNoTelp" name="inputNoTelp" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputFotoProfile" class="col-sm-2 col-form-label control-label">Foto Profile</label>
                        <div class="col-sm-10 ">
                            <input class="form-control" type="file" id="inputFotoProfile" name="inputFotoProfile" accept="image/png, image/jpeg, image/jpg" required>
                        </div>
                    </div>

                    <div class="row mb-3 form-horizontal">
                        <h5 class="card-subtitle mb-2 text-muted">Form Mahasiswa</h5>
                        <hr>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputJurusan" class="col-sm-2 col-form-label control-label">Jurusan</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputJurusan" name="inputJurusan" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputTahunMasuk" class="col-sm-2 col-form-label control-label">Tahun Masuk</label>
                        <div class="col-sm-10 ">
                            <input type="number" class="form-control" id="inputTahunMasuk" name="inputTahunMasuk" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputTahunLulus" class="col-sm-2 col-form-label control-label">Tahun Lulus</label>
                        <div class="col-sm-10 ">
                            <input type="number" class="form-control" id="inputTahunLulus" name="inputTahunLulus" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Tambahkan Mahasiswa</button>
                        <button type="reset" class="btn btn-secondary">Batal</button>
                    </div>
                </form>
                <!-- End Horizontal Form -->
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-confirmation-delete" tabindex="-1" aria-labelledby="modal-confirmation-deleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Mahasiswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post"  class="row g-3 needs-validation was-validated" novalidate>
                        @method('DELETE')
                        <div class="modal-body" id="modal-body-delete">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger" id="btnDeleteConfirm" disabled>Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
