<main id="main" class="main container" style="width: auto;">
    <div class="pagetitle">
        <h3 style="color: #33297D; font-weight: bold;">Jadwal Mengajar</h3>
    </div>

    <div id="jadwal-container" class="card" style="margin-top: 20px; padding: 10px 10px 0px 10px;">
        <div class="d-flex flex-row-reverse" style="margin-bottom: 20px;">
            <i id="week-right" class="bi bi-caret-right" style="cursor: pointer;" onclick="javascript:addWeek(1)"></i>
            <div id="text-week" style="margin-left: 10px; margin-right: 10px;">{{ $week }}</div>
            <i id="week-left" class="bi bi-caret-left" style="cursor: pointer;" onclick="javascript:addWeek(-1)"></i>
        </div>
        <div class="row">
            <div class="col-sm-1" style="padding: 0px;">
                <table class="table table-borderless" style="font-size: 12px; margin-top: 25px; text-align: right;">
                    @for ($i = 7; $i <= 19; $i++)
                        @if ($i < 10)
                            <tr><td style="border: none; height: 60px">0{{$i}}.00</td></tr>
                        @else
                            <tr><td style="border: none; height: 60px">{{$i}}.00</td></tr>
                        @endif
                    @endfor
                </table>
            </div>
            <div class="col-sm-11">
                <table class="table table-borderless" style="table-layout: fixed;">
                    <thead>
                        <tr id="tr-tanggal" style="text-align: center;">
                            <th style="border: none;">{{$tanggal[0]}}</th>
                            <th style="border: none;">{{$tanggal[1]}}</th>
                            <th style="border: none;">{{$tanggal[2]}}</th>
                            <th style="border: none;">{{$tanggal[3]}}</th>
                            <th style="border: none;">{{$tanggal[4]}}</th>
                            <th style="border: none;">{{$tanggal[5]}}</th>
                            <th style="border: none;">{{$tanggal[6]}}</th>
                        </tr>
                    </thead>
                    <tbody id="tabel-jadwal-mengajar">
                        @for ($i = 0; $i <= 12; $i++)
                            <tr style="height: 60px;">
                                @for ($j = 0; $j <= 6; $j++)
                                    @php
                                        $jam_mulai = $i + 7;
                                        $str_tgl = "{$j}-{$jam_mulai}";
                                        $is_true = False;
                                        $ind = 0;
                                    @endphp
                                    @for ($k = 0; $k < count($jadwal_mengajar); $k++)
                                        @if ($str_tgl == $jadwal_mengajar[$k]['string_tanggal'])
                                            @php
                                                $is_true = True;
                                                $ind = $k;
                                                for ($it = 1; $it < $jadwal_mengajar[$ind]['lama_mengajar']; $it++) {
                                                    $jadwal[$i+$it][$j] = 0;
                                                }
                                            @endphp
                                        @endif
                                    @endfor
                                    @if ($is_true)
                                        {{ logger($str_tgl) }}
                                        <td rowspan="{{$jadwal_mengajar[$ind]['lama_mengajar']}}" style="color: #FF730D; background: #FFF4F1; font-size: 12px; border: #FF730D 1px solid;">
                                            {{$jadwal_mengajar[$ind]['nama']}} <br><br> {{$jadwal_mengajar[$ind]['ruangan']}}
                                        </td>
                                    @endif
                                    @if ($jadwal[$i][$j] != 0 && $is_true == False)
                                        <td></td>
                                    @endif
                                @endfor
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    var week = 0;

    function addWeek(value) {
        week += value;
        $.get('/dosen/jadwal-mengajar/' + week)
            .done(function (response) {
                $('#text-week').text(response['week']);

                $('#tr-tanggal th').remove();
                var str_tanggal = '';
                response['tanggal'].forEach(element => {
                    str_tanggal += '<th style="border: none;">' + element + '</th>';
                });
                $('#tr-tanggal').append(str_tanggal);

                $('#tabel-jadwal-mengajar tr').remove();
                var str_tabel_jadwal = '';
                for (let i = 0; i <= 12; i++) {
                    str_tabel_jadwal += '<tr style="height: 60px;">';
                    for (let j = 0; j <= 6; j++) {
                        var jam_mulai = i + 7;
                        var str_tgl = j + '-' + jam_mulai;
                        var is_true = false;
                        var ind = 0;

                        for (let k = 0; k < response['jadwal_mengajar'].length; k++) {
                            if (str_tgl == response['jadwal_mengajar'][k]['string_tanggal']) {
                                is_true = true;
                                ind = k;
                                for (let it = 1; it <= response['jadwal_mengajar'][k]['lama_mengajar']; it++) {
                                    response['jadwal'][i+it][j] = 0;
                                }
                            }
                        }

                        if (is_true) {
                            str_tabel_jadwal += '<td rowspan="' + response['jadwal_mengajar'][ind]['lama_mengajar'] +'" style="color: #FF730D; background: #FFF4F1; font-size: 12px; border: #FF730D 1px solid;">';
                            str_tabel_jadwal += response['jadwal_mengajar'][ind]['nama'] + '<br><br>' + response['jadwal_mengajar'][ind]['ruangan'] + '</td>';
                        } else if (response['jadwal'][i][j] != 0 && is_true == false) {
                            str_tabel_jadwal += '<td></td>';
                        }
                    }
                    str_tabel_jadwal += '</tr>';
                }
                $('#tabel-jadwal-mengajar').append(str_tabel_jadwal);
            });
    }
</script>
