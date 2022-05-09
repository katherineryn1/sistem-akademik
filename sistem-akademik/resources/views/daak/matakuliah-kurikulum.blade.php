@extends('layouts.app')
@section('title', $page_title)

@section('sidebar')
    @include('daak.sidebar')
@endsection

@section('content')
    <main id="main" class="main">
        <div id="alertsSection">
            @include('layouts.errors-msg')
            @include('layouts.erros-default')
        </div>
        <div class="pagetitle">
            <h1>Layanan Matakuliah - Kurikulum</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 class="col card-title align-self-center">Data Matakuliah</h5>
                    <div class="col text-end align-self-center">
                        <a href="#" class="btn btn-primary">Buat Matakuliah</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <!-- Table with hoverable rows -->
                    <table class="table table-hover align-middle" id="tableDataMatakuliah">
                        <thead>
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Sifat</th>
                            <th scope="col">SKS</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data_matakuliah as $matakuliah)
                            <tr>
                                <th scope="row">{{ $matakuliah['kode'] }}</th>
                                <td>{{ $matakuliah['nama'] }}</td>
                                <td>{{ $matakuliah['jenis']->getString() }}</td>
                                <td>{{ $matakuliah['sifat']->getString() }}</td>
                                <td>{{ $matakuliah['sks'] }}</td>
                                <td>
                                    <a href="{{ url("/daak/matakuliah/{$matakuliah['kode']}") }}" class="btn btn-warning" >
                                        <i width="1rem" height="1rem" fill="currentColor" class="bi bi-pencil-square"></i>
                                    </a>
                                    <button onclick="modalConfirmDeletion('{{ $matakuliah['kode'] }}', 'kode' , 'modal-matakuliah-body-delete', 'btnDeleteMatakuliahConfirm' )"
                                            class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-matakuliah-confirmation-delete">
                                        <i width="1rem" height="1rem" fill="currentColor" class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with hoverable rows -->
                    <div id="pageNavPositionMatakuliah" class="pager-nav d-flex justify-content-center">
                    </div>
                    <script>
                        let pagerMatakuliah = new Pager('tableDataMatakuliah', 10);
                        pagerMatakuliah.init();
                        pagerMatakuliah.showPageNav('pager', 'pageNavPositionMatakuliah');
                        pagerMatakuliah.showPage(1);
                    </script>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 class="col card-title align-self-center">Data Kurikulum</h5>
                    <div class="col text-end align-self-center">
                        <a href="#" class="btn btn-primary">Buat Kurikulum-Matakuliah</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <!-- Table with hoverable rows -->
                    <table class="table table-hover align-middle" id="tableDataKurikulum">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Kode MK</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Jumlah Pertemuan</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data_kurikulum as $kurikulum)
                            <tr>
                                <th scope="row">{{ $kurikulum['id'] }}</th>
                                <td>{{ $kurikulum['kode_matakuliah'] }}</td>
                                <td>{{ $kurikulum['tahun'] }}</td>
                                <td>{{ $kurikulum['semester']->getString() }}</td>
                                <td>{{ $kurikulum['kelas'] }}</td>
                                <td>{{ $kurikulum['jumlah_pertemuan'] }}</td>
                                <td>
                                    <a href="{{ url("/daak/kurikulum/{$kurikulum['id']}") }}" class="btn btn-warning" >
                                        <i width="1rem" height="1rem" fill="currentColor" class="bi bi-pencil-square"></i>
                                    </a>
                                    <button onclick="modalConfirmDeletion('{{ $kurikulum['id'] }}',  'id', 'modal-kurikulum-body-delete', 'btnDeleteKurikulumConfirm' )"
                                            class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-kurikulum-confirmation-delete">
                                        <i width="1rem" height="1rem" fill="currentColor" class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with hoverable rows -->
                    <div id="pageNavPositionKurikulum" class="pager-nav d-flex justify-content-center">
                    </div>
                    <script>
                        let pagerKurikulum = new Pager('tableDataKurikulum', 10);
                        pagerKurikulum.init();
                        pagerKurikulum.showPageNav('pager', 'pageNavPositionKurikulum');
                        pagerKurikulum.showPage(1);
                    </script>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Buat Matakuliah</h5>
                <!-- Horizontal Form -->
                <form action="{{ url("v1/matakuliah")  }}"  method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="row mb-3 form-horizontal">
                        <h5 class="card-subtitle mb-2 text-muted">Form Matakuliah</h5>
                        <hr>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputKode" class="col-sm-2 col-form-label control-label">Kode</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputKode" name="inputKode" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputNama" class="col-sm-2 col-form-label control-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputNama" name="inputNama" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputJenis" class="col-sm-2 col-form-label control-label">Jenis</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputJenis" name="inputJenis" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputSifat" class="col-sm-2 col-form-label control-label">Sifat</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputSifat" name="inputSifat" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputSKS" class="col-sm-2 col-form-label control-label">SKS</label>
                        <div class="col-sm-10 ">
                            <input type="number" class="form-control" id="inputSKS" name="inputSKS" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Buat Matakuliah</button>
                        <button type="reset" class="btn btn-secondary">Batal</button>
                    </div>
                </form>
                <!-- End Horizontal Form -->
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Buat Kurikulum</h5>
                <!-- Horizontal Form -->
                <form action="{{ url("v1/kurikulum")  }}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="row mb-3 form-horizontal">
                        <h5 class="card-subtitle mb-2 text-muted">Form Kurikulum</h5>
                        <hr>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputKode" class="col-sm-2 col-form-label control-label">Kode Matakuliah</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputKode" name="inputKode" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputTahun" class="col-sm-2 col-form-label control-label">Tahun</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputTahun" name="inputTahun" value="2020" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputSemester" class="col-sm-2 col-form-label control-label">Semester</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputSemester" name="inputSemester" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputKelas" class="col-sm-2 col-form-label control-label">Kelas</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputKelas" name="inputKelas" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputJmlPertemuan" class="col-sm-2 col-form-label control-label">Jumlah Pertemuan</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputJmlPertemuan" name="inputJmlPertemuan" value="0" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Buat Kurikulum-Matakuliah</button>
                        <button type="reset" class="btn btn-secondary">Batal</button>
                    </div>
                </form>
                <!-- End Horizontal Form -->
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-matakuliah-confirmation-delete" tabindex="-1" aria-labelledby="modal-confirmation-deleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Matakuliah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url("v1/matakuliah")  }}"  method="post"  class="row g-3 needs-validation was-validated" novalidate>
                        @csrf
                        @method('DELETE')
                        <div class="modal-body" id="modal-matakuliah-body-delete">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger" id="btnDeleteMatakuliahConfirm" disabled>Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-kurikulum-confirmation-delete" tabindex="-1" aria-labelledby="modal-confirmation-deleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Kurikulum Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url("v1/kurikulum")  }}"  method="post"  class="row g-3 needs-validation was-validated" novalidate>
                        @csrf
                        @method('DELETE')
                        <div class="modal-body" id="modal-kurikulum-body-delete">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger" id="btnDeleteKurikulumConfirm" disabled>Hapus</button>
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
