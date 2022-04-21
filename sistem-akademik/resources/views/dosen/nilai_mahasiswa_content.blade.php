<main id="main" class="main container" style="width: auto;">
    <div class="pagetitle">
        <h3 style="color: #33297D; font-weight: bold;">Nilai Mahasiswa</h3>
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
        </div>
    </form>

    <div id="nilai-mahasiswa-container" class="card" style="margin-top: 20px; padding: 10px 10px 0px 10px; visibility: hidden;">
        <div class="d-flex justify-content-between" style="margin-bottom: 20px;">
            <h5 id="matakuliah-kelas">Rekayasa Perangkat Lunak - Kelas B</h5>
            <button class="btn btn-primary" type="button" id="buttonEditNilai" onclick="javascript:resetModal()"
                style="background-color: #33297D;" data-toggle="modal" data-target="#modalEditNilai">Edit Nilai</button>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th class="col-sm-1" scope="col">No</th>
                    <th class="col-sm-1" scope="col">NIM</th>
                    <th class="col-sm-2" scope="col">Nama Lengkap</th>
                    <th class="col-sm-1" scope="col" style="text-align: right;">N1</th>
                    <th class="col-sm-1" scope="col" style="text-align: right;">N2</th>
                    <th class="col-sm-1" scope="col" style="text-align: right;">N3</th>
                    <th class="col-sm-1" scope="col" style="text-align: right;">N4</th>
                    <th class="col-sm-1" scope="col" style="text-align: right;">N5</th>
                    <th class="col-sm-1" scope="col" style="text-align: right;">UAS</th>
                    <th class="col-sm-1" scope="col" style="text-align: right;">Nilai Akhir</th>
                    <th class="col-sm-1" scope="col" style="text-align: center;">Index</th>
                </tr>
            </thead>

            <tbody id="tabel-nilai-mahasiswa">
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
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 350px; background-color: #F4F6F8; color: black;">
                                --- Pilih Mahasiswa ---
                            </button>

                            <div id="dropdown-nim-nama" class="dropdown-menu" aria-labelledby="dropdownNIM">
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

                        <tbody id="tabel-modal-nilai-mahasiswa">
                            <tr class="table-secondary">
                                <td>
                                    <input type="text" class="form-control" id="form-n1" placeholder="-" required id="form-nilai-n1">
                                    <div class="invalid-feedback">
                                        Tolong isi dengan angka atau '-'.
                                    </div>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="form-n2" placeholder="-" required id="form-nilai-n2">
                                    <div class="invalid-feedback">
                                        Tolong isi dengan angka atau '-'.
                                    </div>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="form-n3" placeholder="-" required id="form-nilai-n3">
                                    <div class="invalid-feedback">
                                        Tolong isi dengan angka atau '-'.
                                    </div>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="form-n4" placeholder="-" required id="form-nilai-n4">
                                    <div class="invalid-feedback">
                                        Tolong isi dengan angka atau '-'.
                                    </div>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="form-n5" placeholder="-" required id="form-nilai-n5">
                                    <div class="invalid-feedback">
                                        Tolong isi dengan angka atau '-'.
                                    </div>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="form-uas" placeholder="-" required id="form-nilai-uas">
                                    <div class="invalid-feedback">
                                        Tolong isi dengan angka atau '-'.
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" id="buttonSave" onclick="javascript:updateNilaiMahasiswa()"
                        style="background-color: #33297D;" data-dismiss="modal">Simpan</button>
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

var mahasiswa_nim = -1;
var mahasiswa_name = "";

var arr_nim_nama = [];
var arr_id_nilai = [];

var id_nilai_mahasiswa = -1;

$('#dropdown-matakuliah a').click(function() {
    resetKelas();

    $('#dropdownMatakuliah').html($(this).text());
    matakuliah_id = $(this).attr('id');
    matakuliah_name = $(this).text();
    $.get('/dosen/nilai-mahasiswa/kelas/' + matakuliah_id)
        .done(function (response) {
            var html_string = "";
            response.forEach(element => {
                html_string += '<a id="' + element['id_kurikulum']
                    + '" class="dropdown-item" href="#" onclick="javascript:selectKelas(this)" style="width: 350px;"> Kelas '
                    + element['kelas'] + '</a>';
            });
            $('#dropdown-kelas').append(html_string);
        });
});

function selectKelas(item) {
    $('#dropdownKelas').html(item.text);
    kelas_id = item.id;
    kelas_name = item.text;
    updateTabelNilaiMahasiswa();
}

function updateTabelNilaiMahasiswa() {
    $.get('/dosen/nilai-mahasiswa/' + kelas_id)
        .done(function (response) {
            $('#nilai-mahasiswa-container').css('visibility', 'visible');
            $('#matakuliah-kelas').text(matakuliah_name + " - " + kelas_name);
            $('#dropdown-nim-nama .dropdown-item').remove();
            arr_nim_nama = [];
            arr_id_nilai = [];

            $('#tabel-nilai-mahasiswa tr').remove();
            var html_string = "";
            var counter = 1;
            response.forEach(element => {
                var str = createHtmlTagForTable(element, counter);
                html_string += str;
                counter++;

                arr_nim_nama.push(element['nim'] + ' - ' + element['nama']);
                arr_id_nilai.push(element['id_nilai']);
            });

            $('#tabel-nilai-mahasiswa').append(html_string);
            setModal();
        });
}

$('#buttonSave').click(function() {
    if (id_nilai_mahasiswa != -1) {
        // Simpan nilai baru

        // Lalu perbarui tabel nilai
        $.get('/dosen/nilai-mahasiswa/' + kelas_id)
        .done(function (response) {
            $('#tabel-nilai-mahasiswa tr').remove();
            var html_string = "";
            var counter = 1;
            response.forEach(element => {
                var str = createHtmlTagForTable(element, counter);
                html_string += str;
                counter++;
            });
            $('#tabel-nilai-mahasiswa').append(html_string);
        });
    }
    resetModal();
});

function resetKelas() {
    kelas_id = -1;
    kelas_name = "";
    $('#dropdownKelas').html('------ Pilih Kelas ------');
    $('#dropdown-kelas .dropdown-item').remove();
}

function resetModal() {
    id_nilai_mahasiswa = -1;
    $('#dropdownNIM').html("--- Pilih Mahasiswa ---");
    $('#input-table-nilai').css('visibility', 'hidden');
}

function createHtmlTagForTable(element, counter) {
    if (counter % 2 == 1) {
        var str = '<tr class="table-secondary"><td>';
    } else {
        var str = '<tr><td>';
    }

    str += counter + '</td><td>' + element['nim'] + '</td><td>' + element['nama'] + '</td><td style="text-align: right;">';

    if (element['n1'] == -1 || element['n1'] == null) {
        str += '-</td><td style="text-align: right;">';
    } else {
        str += element['n1'] + '</td><td style="text-align: right;">';
    }

    if (element['n2'] == -1 || element['n2'] == null) {
        str += '-</td><td style="text-align: right;">';
    } else {
        str += element['n2'] + '</td><td style="text-align: right;">';
    }

    if (element['n3'] == -1 || element['n3'] == null) {
        str += '-</td><td style="text-align: right;">';
    } else {
        str += element['n3'] + '</td><td style="text-align: right;">';
    }

    if (element['n4'] == -1 || element['n4'] == null) {
        str += '-</td><td style="text-align: right;">';
    } else {
        str += element['n4'] + '</td><td style="text-align: right;">';
    }

    if (element['n5'] == -1 || element['n5'] == null) {
        str += '-</td><td style="text-align: right;">';
    } else {
        str += element['n5'] + '</td><td style="text-align: right;">';
    }

    if (element['nUAS'] == -1 || element['nUAS'] == null) {
        str += '-</td><td style="text-align: right;">';
    } else {
        str += element['nUAS'] + '</td><td style="text-align: right;">';
    }

    if (element['na'] == -1 || element['na'] == null) {
        str += '-</td>';
    } else {
        str += element['na'].toFixed(2) + '</td>';
    }

    str += '<td style="text-align: center;">' + element['index'] + '</td>';
    return str;
}

function setModal() {
    var html_string = "";

    for (let i = 0; i < arr_id_nilai.length; i++) {
        var str = '<a id="' + arr_id_nilai[i] + '" class="dropdown-item" href="#" onclick="javascript:selectMahasiswa(this)" style="width: 350px;">' +
            arr_nim_nama[i] + '</a>';
        html_string += str;
    }

    $('#dropdown-nim-nama').append(html_string);
}

function selectMahasiswa(item) {
    $('#dropdownNIM').html(item.text);
    id_nilai_mahasiswa = item.id;
    $.get('/dosen/nilai-mahasiswa/mahasiswa/' + item.id)
        .done(function (response) {
            $('#modalEditNilai #form-n1').val('');
            $('#modalEditNilai #form-n2').val('');
            $('#modalEditNilai #form-n3').val('');
            $('#modalEditNilai #form-n4').val('');
            $('#modalEditNilai #form-n5').val('');
            $('#modalEditNilai #form-uas').val('');

            if (response['n1'] != -1 && response['n1'] != null) {
                $('#modalEditNilai #form-n1').val(response['n1']);
            }
            if (response['n2'] != -1 && response['n2'] != null) {
                $('#modalEditNilai #form-n2').val(response['n2']);
            }
            if (response['n3'] != -1 && response['n3'] != null) {
                $('#modalEditNilai #form-n3').val(response['n3']);
            }
            if (response['n4'] != -1 && response['n4'] != null) {
                $('#modalEditNilai #form-n4').val(response['n4']);
            }
            if (response['n5'] != -1 && response['n5'] != null) {
                $('#modalEditNilai #form-n5').val(response['n5']);
            }
            if (response['nUAS'] != -1 && response['nUAS'] != null) {
                $('#modalEditNilai #form-uas').val(response['nUAS']);
            }

            $('#input-table-nilai').css('visibility', 'visible');
        });
}

function updateNilaiMahasiswa() {
    if (id_nilai_mahasiswa != -1) {
        var data = {};

        var arr_nilai = [];
        var total = 0;
        var counter = 0;
        $('#tabel-modal-nilai-mahasiswa input').each(function() {
            var value = $(this).val();

            if (value == '' || value == '-') {
                arr_nilai.push('null');
            } else {
                value = parseInt(value);
                arr_nilai.push(value.toFixed(2));
                counter++;
                total += value;
            }
        });
        data['nilai'] = arr_nilai

        var na = (total / counter).toFixed(2);
        data['nilai_akhir'] = na;

        var index = 'A';
        if (na < 41) {
            index = 'E';
        } else if (na < 56) {
            index = 'D';
        } else if (na < 60) {
            index = 'C';
        } else if (na < 64) {
            index = 'C+';
        } else if (na < 68) {
            index = 'B-';
        } else if (na < 72) {
            index = 'B';
        } else if (na < 76) {
            index = 'B+';
        } else if (na < 80) {
            index = 'A-';
        }
        data['index'] = index;
        console.log(data);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "/dosen/nilai-mahasiswa/update/" + id_nilai_mahasiswa,
            data: data,
            success: function(data) {
                if (data == 'Success') {
                    alert('Update successful.');
                } else if (data == 'Failed') {
                    alert('Update data failed, please try again later.');
                } else {
                    alert('Unexpected error, please reload.');
                    console.log(data);
                }
            },
            error: (error) => {
                console.log(JSON.stringify(error));
            },
        });

        updateTabelNilaiMahasiswa();
    }
}
</script>
