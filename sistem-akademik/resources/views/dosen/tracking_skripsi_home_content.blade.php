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
            {{-- @if (count($skripsi) == 0)
                <tr>
                    <td colspan="5" style="text-align: center"> Tidak ada data</td>
                </tr>
                <tr>
            @endif --}}
            @foreach ($skripsi as $s)
            <tr>
                <th scope="row">
                    {{ $s->id }}
                </th>
                <td>
                    {{ $s->nim }}
                </td>
                <td>
                    {{ $s->nama }}
                </td>
                <td>
                    {{ $s->judul }}
                </td>
                <td>
                    {{ $s->komentar }}
                </td>
                <td>
                    {{ $s->milestone }}
                </td>
                <td>
                    <a href="{{ url('/dosen/tracking-skripsi-id') }}" class="btn btn-primary" style="background-color: #33297D;">Detail</a>
                    <form action="/hapusMhs/{{ $s->nim }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a href="#" class="btn btn-outline-danger">Hapus</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
