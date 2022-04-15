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
            <h1>Layanan Pengumuman</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 class="col card-title align-self-center">Data Pengumuman</h5>
                    <div class="col text-end align-self-center">
                        <a href="#" class="btn btn-primary">Buat Pengumuman</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <!-- Table with hoverable rows -->
                    <table class="table table-hover align-middle" id="tableData">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $pengumuman)
                            <tr>
                                <th scope="row">{{ $pengumuman['id'] }}</th>
                                <td>{{ $pengumuman['nama'] }}</td>
                                <td>{{ $pengumuman['type'] }}</td>
                                <td>{{ $pengumuman['age'] }}</td>
                                <td>
                                    <a href="{{ url("/daak/pengumuman/{$pengumuman['id']}/edit") }}" class="btn btn-warning" >
                                        <i width="1rem" height="1rem" fill="currentColor" class="bi bi-pencil-square"></i>
                                    </a>
                                    <button onclick="modalConfirmDeletion({{ $pengumuman['id'] }})" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirmation-delete">
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
                <h5 class="card-title">Buat Pengumuman</h5>

                <!-- Horizontal Form -->
                <form action=""  method="post" enctype='multipart/form-data'>
                    <div class="row mb-3 form-horizontal">
                        <h5 class="card-subtitle mb-2 text-muted">Form Pengumuman</h5>
                        <hr>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputJudul" class="col-sm-2 col-form-label control-label">Judul</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputJudul" name="inputJudul" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputKeterangan" class="col-sm-2 col-form-label control-label">Keterangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputKeterangan" name="inputKeterangan" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputTanggal" class="col-sm-2 col-form-label control-label">Tanggal</label>
                        <div class="col-sm-10 ">
                            <input type="date" class="form-control" id="inputTanggal" name="inputTanggal"  value="{{ date("Y-m-d")  }}" readonly="readonly">
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputFotoPengumuman" class="col-sm-2 col-form-label control-label">Gambar (Opsional)</label>
                        <div class="col-sm-10 ">
                            <input class="form-control" type="file" id="inputFotoPengumuman" name="inputFotoPengumuman" accept="image/png, image/jpeg, image/jpg">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Buat Pengumuman</button>
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
                        <h5 class="modal-title">Hapus Pengumuman</h5>
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
        <script>
            scanAlertsURL();
        </script>
    </main>
@endsection
