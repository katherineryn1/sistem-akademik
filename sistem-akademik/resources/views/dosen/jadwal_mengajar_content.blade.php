<main id="main" class="main container" style="width: auto;">
    <div class="pagetitle">
        <h3 style="color: #33297D; font-weight: bold;">Jadwal Mengajar</h3>
    </div>

    <div id="jadwal-container" class="card" style="margin-top: 20px; padding: 10px 10px 0px 10px;">
        <div class="d-flex flex-row-reverse" style="margin-bottom: 20px;">
            <i id="week-right" class="bi bi-caret-right" style="cursor: pointer;"></i>
            <div id="text-week" style="margin-left: 10px; margin-right: 10px;">6 - 12 February 2022</div>
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
                        @php $i = 6 @endphp
                        <tr style="text-align: center;">
                            <th style="border: none;">Sun {{$i}}</th>
                            <th style="border: none;">Mon {{$i+1}}</th>
                            <th style="border: none;">Tue {{$i+2}}</th>
                            <th style="border: none;">Wed {{$i+3}}</th>
                            <th style="border: none;">Thr {{$i+4}}</th>
                            <th style="border: none;">Fri {{$i+5}}</th>
                            <th style="border: none;">Sat {{$i+6}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $nextCol = 6; @endphp
                        @for ($i = 0; $i <= 12; $i++)
                            <tr style="height: 60px;">
                                @php $colSize = $nextCol; @endphp
                                @php $nextCol = 6; @endphp
                                @for ($j = 0; $j <= $colSize; $j++)
                                    @if ($i == 0 && $j == 3)
                                        <td rowspan="2" style="color: #FF730D; background: #FFF4F1; font-size: 12px; border: #FF730D 1px solid;">
                                            Rekayasa Perangkat Lunak Lanjut <br><br> 7-10
                                        </td>
                                        @php $nextCol = $nextCol - 1; @endphp
                                    @else
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
