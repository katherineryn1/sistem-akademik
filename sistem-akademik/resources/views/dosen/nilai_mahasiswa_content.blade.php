<main id="main" class="main container">
    <div class="pagetitle">
        <h3 style="color: #33297D; font-weight: bold;">Nilai Mahasiswa</h3>
    </div>

    <form>
        <div class="card" style="padding: 5px; width: 365px;">
            <div class="form-group row" style="margin: 5px;">
                <label for="dropdownMatakuliah" class="col-form-label" style="width: 120px">Mata Kuliah</label>
                <label class="col-form-label" style="width: 20px">:</label>
                <div class="dropdown">
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
                <div class="dropdown">
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
                style="background-color: #33297D;">Edit Nilai</button>
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
