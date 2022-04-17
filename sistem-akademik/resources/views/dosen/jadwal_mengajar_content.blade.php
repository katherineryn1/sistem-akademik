<main id="main" class="main container" style="width: auto;">
    <div class="pagetitle">
        <h3 style="color: #33297D; font-weight: bold;">Jadwal Mengajar</h3>
    </div>

    <div id="jadwal-container" class="card" style="margin-top: 20px; padding: 10px 10px 0px 10px;">
        <div class="d-flex flex-row-reverse" style="margin-bottom: 20px;">
            <i id="week-right" class="bi bi-caret-right" style="cursor: pointer;"></i>
            <div id="text-week" style="margin-left: 10px; margin-right: 10px;">{{ $week }}</div>
            <i id="week-left" class="bi bi-caret-left" style="cursor: pointer;"></i>
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
                        <tr style="text-align: center;">
                            <th style="border: none;">Sun {{$day_today}}</th>
                            <th style="border: none;">Mon {{$day_today+1}}</th>
                            <th style="border: none;">Tue {{$day_today+2}}</th>
                            <th style="border: none;">Wed {{$day_today+3}}</th>
                            <th style="border: none;">Thr {{$day_today+4}}</th>
                            <th style="border: none;">Fri {{$day_today+5}}</th>
                            <th style="border: none;">Sat {{$day_today+6}}</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                        @if ($str_tgl == $jadwal_mengajar[$k]->string_tanggal)
                                            @php
                                                $is_true = True;
                                                $ind = $k;
                                                for ($it = 1; $it <= $jadwal_mengajar[$ind]->lama_mengajar; $it++) {
                                                    $jadwal[$i+$it][$j] = 0;
                                                }
                                            @endphp
                                        @endif
                                    @endfor
                                    @if ($is_true)
                                        <td rowspan="{{$jadwal_mengajar[$ind]->lama_mengajar}}" style="color: #FF730D; background: #FFF4F1; font-size: 12px; border: #FF730D 1px solid;">
                                            {{$jadwal_mengajar[$ind]->nama}} <br><br> {{$jadwal_mengajar[$ind]->ruangan}}
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
</script>
