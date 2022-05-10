<main id="main" class="main">
    <div class="pagetitle">
        <h1>Pengumuman</h1>
    </div>

    <div class="col-sm-12">
      <table class="table table-striped">
        <tbody>
          @foreach($pengumuman as $itemPengumuman)
          <tr>
            <th scope="row"><input type="checkbox" disabled="true" id="#" name="#" value="#"></th>
            <td style="width: 90%;">
                <div class="bold500">{{ $itemPengumuman['judul'] }}</div>
                {!! $itemPengumuman['keterangan'] !!}
            </td>
            <td style="width: 20%;">{{ $itemPengumuman['tanggal'] }} <i class="bi bi-trash-fill"></i></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</main>
