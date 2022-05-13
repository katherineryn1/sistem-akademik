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
            <h1>Rencana Studi</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5 class="col card-title align-self-center">Data Rencana Studi</h5>
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

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($rencana_studi as $studi)
                            <tr>
                                <th scope="row">{{ $studi['kode_matakuliah'] }}</th>
                                <td>{{ $studi['semester']->getString() }}</td>
                                <td>{!! $studi['tahun'] !!}</td>
                                <td>{{ $studi['kelas'] }}</td>
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
