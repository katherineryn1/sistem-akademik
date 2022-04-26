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
            <h1>Konfigurasi Akun Pengguna</h1>
        </div>

        <div class="card" style="max-width: 35rem;">
            <div class="card-body">
                <div class="row mb-3 form-horizontal">
                    <label for="inputFilterJurusan" class="col-sm-3 col-form-label control-label">Tipe Akun</label>
                    <div class="col-sm-9">
                        <select onchange="filterRedirect(this,'/daak/pengguna?tipe=')" id="inputFilterJurusan" class="form-select">
                            <option selected="">--Pilih Tipe Akun--</option>
                            <option value="Daak">DAAK</option>
                            <option value="Dosen">Dosen</option>
                            <option value="Mahasiwa">Mahasiswa</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 class="col card-title align-self-center">Data Pengguna</h5>
                    <div class="col text-end align-self-center">
                        <a href="#" class="btn btn-primary">Tambah Pengguna</a>
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
                            <th scope="col">Jabatan</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $pengguna)
                            <tr>
                                <th scope="row">{{ $pengguna['nomor_induk'] }}</th>
                                <td>{{ $pengguna['nama'] }}</td>
                                <td>{{ $pengguna['email'] }}</td>
                                <td>{{ $pengguna['notelepon'] }}</td>
                                <td>{{ $pengguna['jenis_kelamin']}}</td>
                                <td>{{ $pengguna['jabatan']}}</td>
                                <td>{{ $pengguna['alamat']}}</td>
                                <td>
                                    <a href="{{ url("/daak/pengguna/{$pengguna['nomor_induk']}") }}" class="btn btn-warning" >
                                        <i width="1rem" height="1rem" fill="currentColor" class="bi bi-pencil-square"></i>
                                    </a>
                                    <button onclick="modalConfirmDeletion({{ $pengguna['nomor_induk'] }})" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirmation-delete">
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
                <h5 class="card-title">Tambah Pengguna</h5>
                @include('layouts.erros-default')
                <!-- Horizontal Form -->
                <form action="{{ url("/v1/pengguna")  }}"  method="post" enctype='multipart/form-data'>
                    @csrf
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
                                <input class="form-check-input" type="radio" name="inputJenisKelamin" id="inputJKWanita" value="Wanita" required>
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
                            <input type="text" class="form-control" id="inputNoTelp" name="inputNoTelp" >
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputFotoProfile" class="col-sm-2 col-form-label control-label">Foto Profile</label>
                        <div class="col-sm-10 ">
                            <input class="form-control" type="file" id="inputFotoProfile" name="inputFotoProfile" accept="image/png, image/jpeg, image/jpg" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputTipePengguna" class="col-sm-2 col-form-label control-label">Tipe Pengguna</label>
                        <div class="col-sm-10 ">
                            <select  id="inputTipePengguna" class="form-select" name="inputTipePengguna" required>
                                <option selected="">--Pilih Tipe Akun--</option>
                                <option value="Daak">DAAK</option>
                                <option value="Dosen">Dosen</option>
                                <option value="Mahasiwa">Mahasiswa</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Tambahkan Pengguna</button>
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
                        <h5 class="modal-title">Hapus Pengguns</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url("/v1/pengguna")  }}" method="post"   class="row g-3 needs-validation was-validated" novalidate>
                        @csrf
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
        <script>
            scanAlertsURL();
        </script>
    </main>
@endsection
