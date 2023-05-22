@extends('layouts.template')

@section('content')
<?php
// dd(session()->all());
?>
<div class="animated fadeIn">
    <!-- Widgets  -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-2">
                            <a href="#"><i class="fa-solid fa-wallet text-primary"></i></a>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <!-- <div class="stat-text">Rp.<span class="count"><?php //echo $produk->showTotalHargaTransaksi();?></span></div> -->
                                <div class="stat-text">Rp.<span class="">
                                @foreach($queryTotalHarga as $qth)
                                <?php echo $qth->total_harga?>
                                @endforeach
                                </span></div>
                                <div class="stat-heading">Pendapatan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-2">
                            <a href="#"><i class="fa-solid fa-cart-arrow-down text-primary"></i></a>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <!-- <div class="stat-text"><span class="count"><?php //echo $produkterjual?></span></div> -->
                                <div class="stat-text"><span class="">{{$queryProdukTerjual}}</span></div>
                                <div class="stat-heading">Produk Terjual</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-3">
                            <a href="#"><i class="fa-solid fa-receipt text-primary"></i></a>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <!-- <div class="stat-text"><span class="count"><?php //echo $jumlahtransaksi?></span></div> -->
                                <div class="stat-text"><span class="">{{$queryTransaksi}}</span></div>
                                <div class="stat-heading">Transaksi</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-4">
                            <a href="#"><i class="fa-solid fa-clipboard-user text-primary"></i></a>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <!-- <div class="stat-text"><span class="count"><?php //echo $produktersisa?></span></div> -->
                                <div class="stat-text"><span class="">{{$queryProdukTersisa}}</span></div>
                                <div class="stat-heading">Produk Tersisa</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Widgets -->
    <!--  Traffic  -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Grafik</h4>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">
                            <div id="traffic-chart" class="traffic-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /# column -->
    </div>
</div>
</div>
</div>
<!-- /#right-panel -->
<!-- Modal Profile -->
<!-- <div class="modal fade" id="modalprofile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="controller/crudprofile.php" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" class="form-control" value="<?php //echo $sesId ?>" name="tid_profile"
                        readonly>
                    <div class="mb-3">
                        <label class="form-label">Nama User</label>
                        <input type="text" class="form-control" value="<?php //echo $sesNama ?>" name="tnama_profile"
                            placeholder="Masukan Nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="<?php //echo $sesEmail ?>"
                            name=" temail_profile" placeholder="Masukan Email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="text" class="form-control" value="<?php //echo $sesPass ?>" name=" tpass_profile"
                            placeholder="Masukan Password" required>
                    </div>
                    <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="form-label">Password Baru</label>
                                <input type="text" class="form-control" value="" name=" tpassbaru_profile"
                                    placeholder="Masukan Password" required>
                            </div>
                            <div class="col-auto ">
                                <label class="form-label">Konfirmasi Password</label>
                                <input type="text" class="form-control" name=" tkonpass_profile"
                                    placeholder="Masukan Password" required>
                            </div>
                        </div> 
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="btn_simpanprofile">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>-->
    <!-- End Modal Profile -->

    <!-- Scripts -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script> -->
    <!-- <script src="assets/js/main.js"></script> -->

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>
    <!--Local Stuff-->
    <script>
    jQuery(document).ready(function($) {
        "use strict";
        if ($('#traffic-chart').length) {
        var chart = new Chartist.Line('#traffic-chart', {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt',
                'Nov', 'Des'
            ],
            series: [
                [  @foreach($januari as $j) 
                        <?php 
                        echo $j->total;?>
                    @endforeach, 
                    @foreach($februari as $f) 
                        <?php 
                        echo $f->total;?>
                    @endforeach,
                    @foreach($maret as $mr) 
                        <?php 
                        echo $mr->total;?>
                    @endforeach,
                    @foreach($april as $a) 
                        <?php 
                        echo $a->total;?>
                    @endforeach, 
                    @foreach($mei as $m) 
                        <?php 
                        echo $m->total;?>
                    @endforeach,
                    @foreach($juni as $jn) 
                        <?php 
                        echo $jn->total;?>
                    @endforeach,
                    @foreach($juli as $jl) 
                        <?php 
                        echo $jl->total;?>
                    @endforeach,
                    @foreach($agustus as $ag) 
                        <?php 
                        echo $ag->total;?>
                    @endforeach,
                    @foreach($september as $s) 
                        <?php 
                        echo $s->total;?>
                    @endforeach,
                    @foreach($oktober as $o) 
                        <?php 
                        echo $o->total;?>
                    @endforeach,
                    @foreach($november as $n) 
                        <?php 
                        echo $n->total;?>
                    @endforeach,
                    @foreach($desember as $d) 
                        <?php 
                        echo $d->total;?>
                    @endforeach
                ],
            ]
        }, {
            low: 0,
            showArea: true,
            showLine: true,
            showPoint: true,
            fullWidth: true,
            axisX: {
                showGrid: true
            }
        });

        chart.on('draw', function(data) {
            if (data.type === 'line' || data.type === 'area') {
                data.element.animate({
                    d: {
                        begin: 2000 * data.index,
                        dur: 2000,
                        from: data.path.clone().scale(1, 0).translate(0, data.chartRect
                            .height()).stringify(),
                        to: data.path.clone().stringify(),
                        easing: Chartist.Svg.Easing.easeOutQuint
                    }
                });
            }
        });
    }
    // Traffic Chart using chartist End
    //Traffic chart chart-js

    });
    </script>
    @endsection