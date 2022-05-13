<main id="main" class="main">
    <div class="pagetitle">
        <h1>Pengumuman</h1>
    </div>

    <pre>
    </pre>
    <table class="table table-striped">
        <tbody>
        @foreach($pengumuman as $p)
          <tr>
            <th width="5%" scope="row"> <input type="checkbox" id="#" name="#" value="#"></th>
            <td width="80%">
                <div class="bold500">{{ $p['judul'] }}</div>
                {!! $p['keterangan'] !!}
            </td>
            <td width="10%">{{  \Carbon\Carbon::parse( $p['tanggal'])->diffForHumans() }}
            </td>
              <td>
                  <i class="bi bi-trash-fill"></i>
              </td>
          </tr>
        @endforeach
        </tbody>
      </table>
</main>
