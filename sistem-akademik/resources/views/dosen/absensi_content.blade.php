<main id="main" class="main container" style="width: auto;">
    <div class="pagetitle">
        <h3 style="color: #33297D; font-weight: bold;">Presensi Kelas</h3>
    </div>

    <form>
        <div class="card" style="padding: 5px; width: 390px;">
            <div class="form-group row" style="margin: 5px;">
                <label for="dropdownMatakuliah" class="col-form-label" style="width: 120px">Mata Kuliah</label>
                <label class="col-form-label" style="width: 20px">:</label>
                <div class="dropdown" style="width: auto;">
                    <button class="btn btn-secondary dropdown-toggle dropdown-toggle-split" type="button" id="dropdownMatakuliah"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 200px; background-color: #F4F6F8; color: black;">
                        --- Pilih Matakuliah ---
                    </button>

                    <div id="dropdown-matakuliah" class="dropdown-menu" aria-labelledby="dropdownMatakuliah">
                        <a class="dropdown-item" href="#"> Kalkulus I </a>
                        <a class="dropdown-item" href="#"> Kalkulus II </a>
                        <a class="dropdown-item" href="#"> Matematika </a>
                    </div>
                </div>
            </div>

            <div class="form-group row" style="margin: 5px;">
                <label for="dropdownKelas" class="col-form-label" style="width: 120px">Kelas</label>
                <label class="col-form-label" style="width: 20px">:</label>
                <div class="dropdown" style="width: auto;">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownKelas"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 200px; background-color: #F4F6F8; color: black;">
                        ------ Pilih Kelas ------
                    </button>

                    <div id="dropdown-kelas" class="dropdown-menu" aria-labelledby="dropdownKelas">
                        <a class="dropdown-item" href="#"> Kelas A </a>
                        <a class="dropdown-item" href="#"> Kelas B </a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div id="presensi-container" class="card" style="margin-top: 20px; padding: 10px 10px 0px 10px; visibility: hidden;">
        <div class="d-flex justify-content-between" style="margin-bottom: 20px;">
            <h4 id="matakuliah-kelas">Rekayasa Perangkat Lunak - Kelas B</h4>
            <button class="btn btn-primary" type="button" id="buttonQR"
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

            <tbody>
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

                                <tbody>
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
var matakuliah_selected = "";
var kelas_selected = "";

$('#dropdown-matakuliah a').click(function() {
    $('#dropdownMatakuliah').html($(this).text());
    matakuliah_selected = $(this).text();
    checkData();
});

$('#dropdown-kelas a').click(function() {
    $('#dropdownKelas').html($(this).text());
    kelas_selected = $(this).text();
    checkData();
});

function checkData() {
    if (matakuliah_selected != "" && kelas_selected != "") {
        $('#presensi-container').css('visibility', 'visible');
        $('#matakuliah-kelas').text(matakuliah_selected + " " + kelas_selected);
    }
};
</script>
