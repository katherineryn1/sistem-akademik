@extends('layouts.app')
@section('title', $page_title)

@section('sidebar')
    @include('daak.sidebar')
@endsection

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Konfigurasi Akun Dosen</h1>
        </div>

        <div class="card" style="width: 35rem;">
            <div class="card-body">
                <div class="row mb-3 form-horizontal">
                    <label for="inputFilterJurusan" class="col-sm-3 col-form-label control-label">Jurusan</label>
                    <div class="col-sm-9">
                        <select id="inputFilterJurusan" class="form-select">
                            <option selected="">--Pilih Jurusan--</option>
                            <option>Teknik Informatika</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 class="col card-title align-self-center">Data Dosen</h5>
                    <div class="col text-end align-self-center">
                        <a href="#" class="btn btn-primary">Tambah Dosen</a>
                    </div>
                </div>
                <!-- Table with hoverable rows -->
                <table class="table table-hover align-middle">
                    <thead>
                    <tr>
                        <th scope="col">Nomor Induk</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">No Telepon</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Bidang Ilmu</th>
                        <th scope="col">Status Ikatan Kerja</th>
                        <th scope="col">Status Dosen</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Brandon Jacob</td>
                        <td>Designer</td>
                        <td>28</td>
                        <td>2016-05-25</td>
                        <td>Designer</td>
                        <td>Designer</td>
                        <td>Designer</td>
                        <td>Designer</td>
                        <td>
                            <a href="{{ url("/daak/pengguna/1/edit") }}" class="btn btn-warning" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" class="bi bi-trash3"  viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>
                            <button onclick="updateHapusDosenModal('1119000')" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirmation-delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                            </svg>
                            </button>
                        </td>
                    </tr>
                   </tbody>
                </table>
                <!-- End Table with hoverable rows -->

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Dosen</h5>

                <!-- Horizontal Form -->
                <form action=""  method="post" enctype='multipart/form-data'>
                    <div class="row mb-3 form-horizontal">
                        <h5 class="card-subtitle mb-2 text-muted">Form Pengguna</h5>
                        <hr>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputNomorInduk" class="col-sm-2 col-form-label control-label">Nomor Induk</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputNomorInduk">
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputNama" class="col-sm-2 col-form-label control-label">Nama</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputNama">
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputEmail" class="col-sm-2 col-form-label control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail">
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputPassword" class="col-sm-2 col-form-label control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputTanggalLahir" class="col-sm-2 col-form-label control-label">Tanggal Lahir</label>
                        <div class="col-sm-10 ">
                            <input type="date" class="form-control" id="inputTanggalLahir">
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputEmail3" class="col-sm-2 col-form-label control-label">Tempat Lahir</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputText">
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
                            <input type="text" class="form-control" id="inputAlamat">
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputNoTelp" class="col-sm-2 col-form-label control-label">Nomor Telepon</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputNoTelp">
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputFotoProfile" class="col-sm-2 col-form-label control-label">Foto Profile</label>
                        <div class="col-sm-10 ">
                            <input class="form-control" type="file" id="inputFotoProfile" name="inputFotoProfile" accept="image/png, image/jpeg, image/jpg">
                        </div>
                    </div>

                    <div class="row mb-3 form-horizontal">
                        <h5 class="card-subtitle mb-2 text-muted">Form Dosen</h5>
                        <hr>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputProgramStudi" class="col-sm-2 col-form-label control-label">Program Studi</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputProgramStudi">
                        </div>
                    </div>
                   <div class="row mb-3 form-horizontal">
                        <label for="inputBidangIlmu" class="col-sm-2 col-form-label control-label">Bidang Ilmu</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputBidangIlmu" name="inputBidangIlmu">
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputGelarAkademik" class="col-sm-2 col-form-label control-label">Gelar Akademik</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputGelarAkademik">
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputStatusIkatanKerja" class="col-sm-2 col-form-label control-label">Status Ikatan Kerja</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputStatusIkatanKerja" name="inputStatusIkatanKerja">
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputStatusDosen" class="col-sm-2 col-form-label control-label">Status Dosen</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputStatusDosen" name="inputStatusDosen">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Tambahkan Dosen</button>
                        <button type="reset" class="btn btn-secondary">Batal</button>
                    </div>
                </form>
                <!-- End Horizontal Form -->
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
        </button>
        <!-- Modal -->
        <div class="modal fade" id="modal-confirmation-delete" tabindex="-1" aria-labelledby="modal-confirmation-deleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Dosen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post"  class="row g-3 needs-validation was-validated" novalidate>
                        @method('DELETE')
                        <div class="modal-body" id="modal-body-hapus-dosen">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger" id="btnHapusDosenConfirm" disabled>Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            const modalHapusDosen = document.getElementById("modal-body-hapus-dosen");
            const btnHapusDosenConfirm = document.getElementById("btnHapusDosenConfirm");
            function updateHapusDosenModal(idDeleteVal = -1) {
                modalHapusDosen.innerHTML = `
                <label for="validationCustom02" class="form-label">Tuliskan kembali <code>${idDeleteVal}</code> untuk konfirmasi :</label>
                <input onkeyup="checkInputEnableButtonSubmit(this,${idDeleteVal})" autocomplete="off" type="text" class="form-control was-validated" name="nomor_induk" placeholder="${idDeleteVal}" required>
                <div class="valid-feedback">
                    Tuliskan <code>${idDeleteVal}</code>
                </div>
                `;
            }
            function checkInputEnableButtonSubmit(el,valueCheck = -1) {
                if(el.value == valueCheck){
                    btnHapusDosenConfirm.disabled = false;
                }else{
                    btnHapusDosenConfirm.disabled = true;
                }
            }
        </script>
    </main>
@endsection
