<main id="main" class="main container" style="width: auto;">
    <div class="pagetitle">
        <h3 style="color: #33297D; font-weight: bold;">Nilai Mahasiswa</h3>
    </div>

    <form>
        <div class="card" style="padding: 5px; width: 390px;">
            <div class="form-group row" style="margin: 5px;">
                <label for="dropdownMatakuliah" class="col-form-label" style="width: 120px">Mata Kuliah</label>
                <label class="col-form-label" style="width: 20px">:</label>
                <div class="dropdown" style="width: auto;">
                    <button class="btn btn-primary dropdown-toggle dropdown-toggle-split" type="button" id="dropdownMatakuliah"
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
            <button class="btn btn-primary" type="button" id="buttonEditNilai"
                style="background-color: #33297D;" data-toggle="modal" data-target="#modalEditNilai">Edit Nilai</button>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th class="col-sm-1" scope="col">No</th>
                    <th class="col-sm-1" scope="col">NIM</th>
                    <th class="col-sm-2" scope="col">Nama Lengkap</th>
                    <th class="col-sm-1" scope="col">N1</th>
                    <th class="col-sm-1" scope="col">N2</th>
                    <th class="col-sm-1" scope="col">N3</th>
                    <th class="col-sm-1" scope="col">N4</th>
                    <th class="col-sm-1" scope="col">N5</th>
                    <th class="col-sm-1" scope="col">UAS</th>
                    <th class="col-sm-1" scope="col">Nilai Akhir</th>
                    <th class="col-sm-1" scope="col">Index</th>
                </tr>
            </thead>

            <tbody>
                <tr class="table-secondary">
                    <td>1</td>
                    <td>1118000</td>
                    <td>John Doe</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>1118001</td>
                    <td>John Doen</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Modal untuk QR Code --}}
    <div class="modal fade" id="modalEditNilai"
        data-bs-backdrop="static" data-target="false" tabindex="-1" aria-labelledby="modalEditNilaiLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditNilaiLabel">Absensi</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group row" style="margin: 5px;">
                        <label for="dropdownNIM" class="col-form-label" style="width: 120px">Mata Kuliah</label>
                        <label class="col-form-label" style="width: 20px">:</label>
                        <div class="dropdown" style="width: auto;">
                            <button class="btn btn-secondary dropdown-toggle dropdown-toggle-split" type="button" id="dropdownNIM"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 200px; background-color: #F4F6F8; color: black;">
                                --- Pilih Mahasiswa ---
                            </button>

                            <div id="dropdown-nim" class="dropdown-menu" aria-labelledby="dropdownNIM">
                                <a class="dropdown-item" href="#"> 1118000 - John Doe </a>
                                <a class="dropdown-item" href="#"> 1118001 - John Doen </a>
                            </div>
                        </div>
                    </div>

                    <table class="table" id="input-table-nilai" style="margin-top: 15px; visibility: hidden;">
                        <thead>
                            <tr>
                                <th class="col-sm-1" scope="col">N1</th>
                                <th class="col-sm-1" scope="col">N2</th>
                                <th class="col-sm-1" scope="col">N3</th>
                                <th class="col-sm-1" scope="col">N4</th>
                                <th class="col-sm-1" scope="col">N5</th>
                                <th class="col-sm-1" scope="col">UAS</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="table-secondary">
                                <td>
                                    <input type="text" class="form-control is-invalid" id="form-n1" placeholder="-" required id="form-nilai-n1">
                                    <div class="invalid-feedback">
                                        Please provide a valid number or '-'.
                                    </div>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="form-n2" placeholder="-" required id="form-nilai-n2">
                                    <div class="invalid-feedback">
                                        Please provide a valid number or '-'.
                                    </div>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="form-n3" placeholder="-" required id="form-nilai-n3">
                                    <div class="invalid-feedback">
                                        Please provide a valid number or '-'.
                                    </div>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="form-n4" placeholder="-" required id="form-nilai-n4">
                                    <div class="invalid-feedback">
                                        Please provide a valid number or '-'.
                                    </div>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="form-n5" placeholder="-" required id="form-nilai-n5">
                                    <div class="invalid-feedback">
                                        Please provide a valid number or '-'.
                                    </div>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="form-uas" placeholder="-" required id="form-nilai-uas">
                                    <div class="invalid-feedback">
                                        Please provide a valid number or '-'.
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
var mahasiswa_selected = "";

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

$('#dropdown-nim a').click(function() {
    $('#dropdownNIM').html($(this).text());
    mahasiswa_selected = $(this).text();
    getMahasiswaGrade();
});

$('#buttonSave').click(function() {
    resetModal();
});

function checkData() {
    if (matakuliah_selected != "" && kelas_selected != "") {
        $('#presensi-container').css('visibility', 'visible');
        $('#matakuliah-kelas').text(matakuliah_selected + " " + kelas_selected);
    }
};

function getMahasiswaGrade() {
    if (mahasiswa_selected != "") {
        $('#input-table-nilai').css('visibility', 'visible');
    }
}

function resetModal() {
    mahasiswa_selected = "";
    $('#dropdownNIM').html("--- Pilih Mahasiswa ---");
    $('#input-table-nilai').css('visibility', 'hidden');
}
</script>
