@extends('layouts.app')
@section('title', $page_title)

@section('sidebar')
    @include('mahasiswa.sidebar')
@endsection

@section('content')
    <main id="main" class="main">
        <div id="alertsSection">
            @include('layouts.errors-msg')
        </div>
        <div class="pagetitle">
            <h1>Transcript Nilai</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 class="col card-title align-self-center">Data Transcript</h5>
                </div>

                <div class="table-responsive">
                    <!-- Table with hoverable rows -->
                    <table class="table table-hover align-middle" id="tableData">
                        <thead>
                        <tr>
                            <th scope="col">Kode Matakuliah</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Nilai 1</th>
                            <th scope="col">Nilai 2</th>
                            <th scope="col">Nilai 3</th>
                            <th scope="col">Nilai 4</th>
                            <th scope="col">Nilai 5</th>
                            <th scope="col">Nilai UAS</th>
                            <th scope="col">Nilai Akhir</th>
                            <th scope="col">Index</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($transript_nilai as $studi)
                            <tr>
                                <th scope="row">{{ $studi['kurikulum']['kode_matakuliah'] }}</th>
                                <td>{{ $studi['kurikulum']['semester']->getString() }}</td>
                                <td>{!! $studi['kurikulum']['tahun'] !!}</td>
                                <td>{{ $studi['kurikulum']['kelas'] }}</td>
                                @if(count($studi['nilai']) > 0 )
                                    <td>{{  $studi['nilai'][0]['nilai_1'] }}</td>
                                    <td>{{ $studi['nilai'][0]['nilai_2'] }}</td>
                                    <td>{{ $studi['nilai'][0]['nilai_3'] }}</td>
                                    <td>{{ $studi['nilai'][0]['nilai_4'] }}</td>
                                    <td>{{ $studi['nilai'][0]['nilai_5'] }}</td>
                                    <td>{{ $studi['nilai'][0]['nilai_UAS'] }}</td>
                                    <td>{{ $studi['nilai'][0]['nilai_akhir'] }}</td>
                                    <td>{{ $studi['nilai'][0]['index'] }}</td>
                                @endif
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
    </main>
@endsection
