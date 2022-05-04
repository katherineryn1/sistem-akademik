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
            <h1>Layanan Jadwal Kuliah</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 class="col card-title align-self-center">Data Jadwal Kuliah</h5>
                    <div class="col text-end align-self-center">
                        <a href="#" class="btn btn-primary">Buat Jadwal Kuliah</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <!-- Table with hoverable rows -->
                    <table class="table table-hover align-middle" id="tableData">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jam Mulai</th>
                            <th scope="col">Jam Selesai</th>
                            <th scope="col">Ruangan</th>
                            <th scope="col">Tipe Jadwal</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- https://codepen.io/n3k1t/pen/OJMGgyq--}}
                        @foreach ($data as $key => $roster)
                            <tr>
                                <td scope="row" colspan="7"><b>Kurikulum Info: ({{ $roster['kurikulum']['id'] }}) {{ $roster['kurikulum']['kode_matakuliah'] }} {{ $roster['kurikulum']['kelas'] }}
                                        {{ $roster['kurikulum']['semester']->getString() }} {{ $roster['kurikulum']['tahun'] }} </b></td>
                            </tr>
                            @foreach($roster['jadwal'] as $jadwal)
                                <tr>
                                    <th scope="row" >{{ $jadwal['id'] }}</th>
                                    <td>{{ $jadwal['tanggal']->format('Y-M-d') }}</td>
                                    <td>{{ $jadwal['jam_mulai'] }}</td>
                                    <td>{{ $jadwal['jam_selesai'] }}</td>
                                    <td>{{ $jadwal['ruangan'] }}</td>
                                    <td>Regular</td>
                                    <td>
                                        <a href="{{ url("/daak/jadwal-kuliah/{$jadwal['id']}/edit") }}" class="btn btn-warning" >
                                            <i width="1rem" height="1rem" fill="currentColor" class="bi bi-pencil-square"></i>
                                        </a>
                                        <button onclick="modalConfirmDeletion({{ $jadwal['id'] }}, 'id')" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-confirmation-delete">
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
                <h5 class="card-title">Buat Jadwal Kuliah</h5>

                <!-- Horizontal Form -->
                <form action="{{ url("v1/jadwal") }}"  method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="row mb-3 form-horizontal">
                        <h5 class="card-subtitle mb-2 text-muted">Form Jadwal Kuliah</h5>
                        <hr>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label class="col-sm-2 col-form-label control-label">Jurusan</label>
                        <div class="col-sm-10">
                            <input type="text" value="Informatika"  class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputKurikulum" class="col-sm-2 col-form-label control-label">Kurikulum MK</label>
                        <div class="col-sm-10 ">
{{--                            <select  id="inputKurikulum" class="form-select" name="inputKurikulum" required>--}}
{{--                                <option selected="">--Pilih Kurikulum MK--</option>--}}
{{--                                <option value="1">1 - IF-201 - Struktur Data</option>--}}
{{--                                <option value="2">2 - IF-301 - RPL</option>--}}
{{--                                <option value="3">3 - IF-101 - Algoritma</option>--}}
{{--                            </select>--}}
                            <input type="text" class="form-control" id="inputKurikulum" name="inputKurikulum" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputTanggal" class="col-sm-2 col-form-label control-label">Tanggal</label>
                        <div class="col-sm-10 ">
                            <input type="date" class="form-control" id="inputTanggal" name="inputTanggal"  value="{{ date("Y-m-d")  }}">
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputRotasi" class="col-sm-2 col-form-label control-label">Rotasi per Minggu</label>
                        <div class="col-sm-10">
                            <input type="number" min="1" class="form-control" id="inputRotasi" name="inputRotasi" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputJamMulai" class="col-sm-2 col-form-label control-label">Jam Mulai</label>
                        <div class="col-sm-10 ">
                            <input type="time" class="form-control" id="inputJamMulai" name="inputJamMulai" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputJamSelesai" class="col-sm-2 col-form-label control-label">Jam Selesai</label>
                        <div class="col-sm-10 ">
                            <input type="time" class="form-control" id="inputJamSelesai" name="inputJamSelesai" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputRuangan" class="col-sm-2 col-form-label control-label">Ruangan</label>
                        <div class="col-sm-10 ">
                            <input type="text" class="form-control" id="inputRuangan" name="inputRuangan" required>
                        </div>
                    </div>
                    <div class="row mb-3 form-horizontal">
                        <label for="inputTipeJadwal" class="col-sm-2 col-form-label control-label">Tipe Jadwal(no implemented)</label>
                        <div class="col-sm-10 ">
                            <select  id="inputTipeJadwal" class="form-select" name="inputTipeJadwal" disabled>
                                <option selected="">--Pilih Tipe Jadwal--</option>
                                <option value="Umum">Umum</option>
                                <option value="UTS">UTS</option>
                                <option value="UAS">UAS</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Buat Jadwal</button>
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
                        <h5 class="modal-title">Hapus Jadwal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url("v1/jadwal") }}" method="post"  class="row g-3 needs-validation was-validated" novalidate>
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
    </main>
@endsection

