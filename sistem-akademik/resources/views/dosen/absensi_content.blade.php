<main id="main" class="main container" style="width: auto;">
    <div class="pagetitle">
        <h3 style="color: #33297D; font-weight: bold;">Presensi Kelas</h3>
    </div>

    <form>
        <div class="card" style="padding: 5px; width: 540px;">
            <div class="form-group row" style="margin: 5px;">
                <label for="dropdownMatakuliah" class="col-form-label" style="width: 120px">Mata Kuliah</label>
                <label class="col-form-label" style="width: 20px">:</label>
                <div class="dropdown" style="width: auto;">
                    <button class="btn btn-secondary dropdown-toggle dropdown-toggle-split" type="button" id="dropdownMatakuliah"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        style="width: 350px; background-color: #F4F6F8; color: black;">
                        --- Pilih Matakuliah ---
                    </button>

                    <div id="dropdown-matakuliah" class="dropdown-menu" aria-labelledby="dropdownMatakuliah">
                        @foreach ($matakuliah as $m)
                            <a id="{{ $m->kode_matkul }}" class="dropdown-item"
                                href="#" style="width: 350px;">{{ $m->nama }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group row" style="margin: 5px;">
                <label for="dropdownKelas" class="col-form-label" style="width: 120px">Kelas</label>
                <label class="col-form-label" style="width: 20px">:</label>
                <div class="dropdown" style="width: auto;">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownKelas"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        style="width: 350px; background-color: #F4F6F8; color: black;">
                        ------ Pilih Kelas ------
                    </button>

                    <div id="dropdown-kelas" class="dropdown-menu" aria-labelledby="dropdownKelas">
                    </div>
                </div>
            </div>

            <div class="form-group row" style="margin: 5px;">
                <label for="dropdownTanggal" class="col-form-label" style="width: 120px">Tanggal</label>
                <label class="col-form-label" style="width: 20px">:</label>
                <div class="dropdown" style="width: auto;">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownTanggal"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        style="width: 350px; background-color: #F4F6F8; color: black;">
                        ---- Pilih Tanggal ----
                    </button>

                    <div id="dropdown-tanggal" class="dropdown-menu" aria-labelledby="dropdownTanggal">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div id="presensi-container" class="card" style="margin-top: 20px; padding: 10px 10px 0px 10px; visibility: hidden;">
        <div class="d-flex justify-content-between" style="margin-bottom: 20px;">
            <h5 id="matakuliah-kelas">Rekayasa Perangkat Lunak - Kelas B</h5>
            <button class="btn btn-primary" type="button" id="buttonQR" onclick="javascript:showQRCode()"
                style="background-color: #33297D;" data-toggle="modal" data-target="#modalQRCode">Tampilkan QR</button>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th class="col-sm-1" scope="col">No</th>
                    <th class="col-sm-2" scope="col">NIM</th>
                    <th class="col-sm-5" scope="col">Nama Lengkap</th>
                    <th class="col-sm-1" scope="col">Hadir</th>
                    <th class="col-sm-1" scope="col">Sakit</th>
                    <th class="col-sm-1" scope="col">Izin</th>
                    <th class="col-sm-1" scope="col">Alpa</th>
                </tr>
            </thead>

            <tbody id="tabel-presensi-body">
                <tr class="table-secondary">
                    <td>1</td>
                    <td>1118000</td>
                    <td>John Doe</td>
                    <td class="text-center">
                        <input class="form-check-input" type="radio" name="absensi-1118000" id="hadir">
                    </td>
                    <td class="text-center">
                        <input class="form-check-input" type="radio" name="absensi-1118000" id="sakit">
                    </td>
                    <td class="text-center">
                        <input class="form-check-input" type="radio" name="absensi-1118000" id="izin">
                    </td>
                    <td class="text-center">
                        <input class="form-check-input" type="radio" name="absensi-1118000" id="alpa" checked>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>1118001</td>
                    <td>John Doen</td>
                    <td class="text-center">
                        <input class="form-check-input" type="radio" name="absensi-1118001" id="hadir">
                    </td>
                    <td class="text-center">
                        <input class="form-check-input" type="radio" name="absensi-1118001" id="sakit">
                    </td>
                    <td class="text-center">
                        <input class="form-check-input" type="radio" name="absensi-1118001" id="izin">
                    </td>
                    <td class="text-center">
                        <input class="form-check-input" type="radio" name="absensi-1118001" id="alpa" checked>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-end" style="margin-bottom: 20px;">
            <button class="btn btn-primary" type="button" id="buttonSimpan"
                style="background-color: #33297D;">Simpan</button>
        </div>
    </div>

    {{-- Modal untuk QR Code --}}
    <div class="modal fade" id="modalQRCode"
        data-bs-backdrop="static" data-target="false" tabindex="-1" aria-labelledby="modalQRCodeLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalQRCodeLabel">Absensi</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <img src="https://i.pinimg.com/originals/60/c1/4a/60c14a43fb4745795b3b358868517e79.png"
                                style="width: 100%; height: 100%;" />
                        </div>
                        <div class="col-sm-7 overflow-auto">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="col-sm-2" scope="col">No</th>
                                        <th class="col-sm-3" scope="col">NIM</th>
                                        <th class="col-sm-7" scope="col">Nama Lengkap</th>
                                    </tr>
                                </thead>

                                <tbody id="tabel-qr-code">
                                    <tr class="table-secondary">
                                        <td>1</td>
                                        <td>1118000</td>
                                        <td>John Doe</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>1118001</td>
                                        <td>John Doen</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" id="buttonSave"
                        style="background-color: #33297D;" data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
var matakuliah_id = -1;
var matakuliah_name = "";
var kelas_id = -1;
var kelas_name = "";
var tanggal_id = -1;
var tanggal_name = "";

$('#dropdown-matakuliah a').click(function() {
    resetKelas();
    resetTanggal();

    $('#dropdownMatakuliah').html($(this).text());
    matakuliah_id = $(this).attr('id');
    matakuliah_name = $(this).text();
    $.get('/dosen/absensi/kelas/' + matakuliah_id)
        .done(function (response) {
            var html_string = "";
            response.forEach(element => {
                html_string += '<a id="' + element['id_kurikulum']
                    + '" class="dropdown-item" href="#" onclick="javascript:selectKelas(this)" style="width: 350px;">'
                    + element['kelas'] + '</a>';
            });
            $('#dropdown-kelas').append(html_string);
        });
});

function selectKelas(item) {
    resetTanggal();

    $('#dropdownKelas').html(item.text);
    kelas_id = item.id;
    kelas_name = item.text;
    $.get('/dosen/absensi/tanggal/' + kelas_id)
        .done(function (response) {
            var html_string = "";
            response.forEach(element => {
                html_string += '<a id="' + element['id_roster']
                    + '" class="dropdown-item" href="#" onclick="javascript:selectTanggal(this)" style="width: 350px;">'
                    + element['tanggal'] + '</a>';
            });
            $('#dropdown-tanggal').append(html_string);
        });
}

function selectTanggal(item) {
    $('#dropdownTanggal').html(item.text);
    tanggal_id = item.id;
    tanggal_name = item.text;
    $.get('/dosen/absensi/roster/' + tanggal_id + '/' + kelas_id)
        .done(function (response) {
            $('#matakuliah-kelas').text(matakuliah_name + ' - ' + kelas_name);
            $('#presensi-container').css('visibility', 'visible');

            resetTabelPresensi();
            var counter = 1;
            response.forEach(element => {
                if (counter % 2 == 1) {
                    var html_string = '<tr id="' + element['id_kehadiran'] + '" class="table-secondary"><td>';
                }
                else {
                    var html_string = '<tr id="' + element['id_kehadiran'] + '"><td>';
                }

                html_string += counter + '</td><td>' + element['nim'] + '</td><td>' + element['nama'] +
                    '</td><td class="text-center"><input class="form-check-input" type="radio" name="' +
                    element['nim'] + '" id="hadir"';
                if (element['keterangan'] == 0) {
                    html_string += 'checked';
                }

                html_string += '></td><td class="text-center"><input class="form-check-input" type="radio" name="' +
                    element['nim'] + '" id="sakit"';
                if (element['keterangan'] == 2) {
                    html_string += 'checked';
                }

                html_string += '></td><td class="text-center"><input class="form-check-input" type="radio" name="' +
                    element['nim'] + '" id="izin"';
                if (element['keterangan'] == 1) {
                    html_string += 'checked';
                }

                html_string += '></td><td class="text-center"><input class="form-check-input" type="radio" name="' +
                    element['nim'] + '" id="alpha"';
                if (element['keterangan'] == 3) {
                    html_string += 'checked';
                }

                html_string += '></td></tr>';

                counter++;
                $('#tabel-presensi-body').append(html_string);
            });
        });
}

function resetKelas() {
    kelas_id = -1;
    kelas_name = "";
    $('#dropdownKelas').html('------ Pilih Kelas ------');
    $('#dropdown-kelas .dropdown-item').remove();
}

function resetTanggal() {
    tanggal_id = -1;
    tanggal_name = "";
    $('#dropdownTanggal').html('---- Pilih Tanggal ----');
    $('#dropdown-tanggal .dropdown-item').remove();
}

function resetTabelPresensi() {
    $('#tabel-presensi-body tr').remove();
}

function showQRCode() {
    // Get QR Code...
    resetTabelQR(); // secara interval
}

function resetTabelQR() {
    $('#tabel-qr-code tr').remove();

    $.get('/dosen/absensi/roster/' + tanggal_id + '/' + kelas_id + '/' + 0)
        .done(function (response) {
            var counter = 1;
            response.forEach(element => {
                if (counter % 2 == 1) {
                    var html_string = '<tr id="' + element['id_kehadiran'] + '" class="table-secondary"><td>';
                }
                else {
                    var html_string = '<tr id="' + element['id_kehadiran'] + '"><td>';
                }

                html_string += counter + '</td><td>' + element['nim'] +
                    '</td><td>' + element['nama'] + '</td></tr>';

                counter++;
                $('#tabel-qr-code').append(html_string);
            });
        });
}
</script>
