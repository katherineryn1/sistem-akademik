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
            <h1>Layanan Pengambilan Matakuliah</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 class="col card-title align-self-center">Data Pengambilan</h5>
                    <div class="col text-end align-self-center">
                        <a href="#" class="btn btn-primary">Buat Pengambilan</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <!-- Table with hoverable rows -->
                    <table class="table table-hover align-middle" id="tableData">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Kode MK</th>
                            <th scope="col">ID Kurikulum</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Nomor Induk</th>
                            <th scope="col">Posisi Ambil</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $item)
                            @foreach ($item['pengambilan_mk'] as $pengambil)
                            <tr>
                                <th scope="row">{{ $pengambil['id'] }}</th>
                                <td>{{ $item['kurikulum']['kode_matakuliah'] }}</td>
                                <td>{{ $item['kurikulum']['id'] }}</td>
                                <td>{{ $item['kurikulum']['semester']->getString() }}</td>
                                <td>{{ $item['kurikulum']['tahun'] }}</td>
                                <td>{{ $item['kurikulum']['kelas'] }}</td>
                                <td>{{ $pengambil['nomor_induk'] }}</td>
                                <td>{{ $pengambil['posisi_ambil']->getString() }}</td>
                                <td>
                                    <button onclick="modalConfirmDeletion({{ $pengambil['id'] }}, 'id')" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirmation-delete">
                                        <i width="1rem" height="1rem" fill="currentColor" class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
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
                <h5 class="card-title">Buat Pengambilan Matakuliah - Kurikulum</h5>
            @include('layouts.erros-default')
            <!-- Horizontal Form -->
                <form action="{{ url("v1/kurikulum/pengambilan") }}"  method="post" enctype='multipart/form-data' autocomplete="off">
                    @csrf
                    <div class="row mb-3 form-horizontal">
                        <h5 class="card-subtitle mb-2 text-muted">Form Pengambilan Matakuliah</h5>
                        <hr>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputKurikulum" class="col-sm-2 col-form-label control-label">ID Kurikulum</label>
                        <div class="col-sm-10 ">
                            <input type="text" list="kurikulumDatalist" class="form-control" id="inputKurikulum" name="inputKurikulum" placeholder="Ketikan untuk mencari kurikulum..." required>
                            <datalist id="kurikulumDatalist">
                                @foreach($dl_kurikulum as $val)
                                    <option value="{{  $val['id'] . " - ".  $val['kode_matakuliah']  . " - ".  $val['tahun']. " - ". $val['semester']->getString()   . " - ".  $val['kelas']}}">
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputNomorIndukPengguna" class="col-sm-2 col-form-label control-label">Nomor Induk Pengguna</label>
                        <div class="col-sm-10">
                            <input type="text" list="penggunaDatalist" class="form-control" id="inputNomorIndukPengguna" name="inputNomorIndukPengguna"  placeholder="Ketikan untuk mencari pengguna..." required>
                            <datalist id="penggunaDatalist">
                                @foreach($dl_pengguna as $val)
                                    <option value="{{ $val['nomor_induk'] . " - ".  $val['email'] . " - ". $val['nama'] . " - ".  $val['jabatan']->getString() }}">
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputPosisiAmbil" class="col-sm-2 col-form-label control-label">Posisi Ambil</label>
                        <div class="col-sm-10 ">
                            <select class="form-select" id="inputPosisiAmbil" name="inputPosisiAmbil" required>
                                <option selected></option>
                                @foreach ($enum_pengambilan_mk as $val)
                                    <option value="{{$val}}">{{$val}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Buat Pengambilan Matakuliah</button>
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
                        <h5 class="modal-title">Hapus Pengambilan Matakuliah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url("v1/kurikulum/pengambilan") }}" method="post"  class="row g-3 needs-validation was-validated" novalidate>
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
