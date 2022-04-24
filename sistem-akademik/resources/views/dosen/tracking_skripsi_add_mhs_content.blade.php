<main id="main" class="main">
    <div class="pagetitle">
        <h1>Add Mahasiswa Bimbingan</h1>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Judul TA</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($skripsi) == 0)
                <tr>
                    <td colspan="5" style="text-align: center"> Tidak ada data</td>
                </tr>
                <tr>
            @endif
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
                        <a href="#" class="btn btn-primary" style="background-color: #33297D;">Terima</a>
                        <form action="/tolakMhs/{{ $s->nim }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="#" class="btn btn-outline-danger">Tolak</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
