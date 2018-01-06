<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 24/12/2017
 * Time: 00.04
 */
session_start();
if($_SESSION['level']!= "root"){
    echo "<script>window.location='../../".$_SESSION['level']."/index.php';</script>";
}
$current_page="laporan";
require '../../../config/db.php';
require '../sections/header.php';
require '../sections/navigation.php';
?>
<div class="wrapper">
    <div class="header header-filter" style="background-image: url('../../assets/img/bg2.jpeg');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="brand">
                        <h1>Laporan</h1>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- you can use the class main-raised if you want the main area to be as a page with shadows -->
    <div class="main main-raised">
        <div class="section section-basic">
            <div class="container">
                <div class="title">
                    <h2>Laporan</h2>
                </div>

                <div class="title">
                    <h2>Grafik</h2>
                </div>

                <div class="card card-nav-tabs">
                    <div class="header header-success">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#tab_laba" data-toggle="tab">
                                            <i class="material-icons">attach_money</i>
                                            Penjualan
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab_rugi" data-toggle="tab">
                                            <i class="material-icons">money_off</i>
                                            Pembelian
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="content">
                        <div class="tab-content text-center">
                            <div class="tab-pane active" id="tab_laba">
                                <canvas id="laba" width="400" height="150"></canvas>
                                <script type="text/javascript">
                                    $(function () {
                                        $.ajax({
                                            type: "GET",
                                            url:"http://localhost/pointofsale/queries/get_all_penjualan.php",
                                            success: function(data){
                                                console.log("data:"+data);
                                                var hasilLaki = [];
                                                hasilLaki.push(data[0].totalJanuari);
                                                hasilLaki.push(data[0].totalFebruari);
                                                hasilLaki.push(data[0].totalMaret);
                                                hasilLaki.push(data[0].totalApril);
                                                hasilLaki.push(data[0].totalMei);
                                                hasilLaki.push(data[0].totalJuni);
                                                hasilLaki.push(data[0].totalJuli);
                                                hasilLaki.push(data[0].totalAgustus);
                                                hasilLaki.push(data[0].totalSeptember);
                                                hasilLaki.push(data[0].totalOktober);
                                                hasilLaki.push(data[0].totalNovember);
                                                hasilLaki.push(data[0].totalDesember);
                                                console.log(hasilLaki);

                                                var chartData = {
                                                    labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni","Juli","Agustus","Oktober","November","Desember"],
                                                    datasets: [
                                                        {
                                                            label: "Penjualan",
                                                            backgroundColor: "rgba(38, 185, 154, 0.31)",
                                                            borderColor: "rgba(38, 185, 154, 0.7)",
                                                            pointBorderColor: "rgba(38, 185, 154, 0.7)",
                                                            pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                                                            pointHoverBackgroundColor: "#fff",
                                                            pointHoverBorderColor: "rgba(220,220,220,1)",
                                                            pointBorderWidth: 1,
                                                            data: hasilLaki
                                                        }
                                                    ]
                                                };
                                                console.log(chartData);
                                                var ctx = document.getElementById("laba");
                                                var lineGraph = new Chart(ctx, {
                                                    type: 'line',
                                                    data: chartData,
                                                    options: {
                                                        scales: {
                                                            yAxes: [{
                                                                ticks: {
                                                                    beginAtZero: true
                                                                }
                                                            }]
                                                        }
                                                    }
                                                });
                                            },
                                            error: function (data) {
                                                console.log(data);
                                            }
                                        });

                                    });
                                </script>

                            </div>
                            <div class="tab-pane" id="tab_rugi">
                                <canvas id="rugi" width="400" height="150"></canvas>
                                <script type="text/javascript">
                                    $(function () {
                                        $.ajax({
                                            type: "GET",
                                            url:"http://localhost/pointofsale/queries/get_all_pembelian.php",
                                            success: function(data){
                                                console.log("data:"+data);
                                                var hasilLaki = [];
                                                hasilLaki.push(data[0].totalJanuari);
                                                hasilLaki.push(data[0].totalFebruari);
                                                hasilLaki.push(data[0].totalMaret);
                                                hasilLaki.push(data[0].totalApril);
                                                hasilLaki.push(data[0].totalMei);
                                                hasilLaki.push(data[0].totalJuni);
                                                hasilLaki.push(data[0].totalJuli);
                                                hasilLaki.push(data[0].totalAgustus);
                                                hasilLaki.push(data[0].totalSeptember);
                                                hasilLaki.push(data[0].totalOktober);
                                                hasilLaki.push(data[0].totalNovember);
                                                hasilLaki.push(data[0].totalDesember);
                                                console.log(hasilLaki);

                                                var chartData = {
                                                    labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni","Juli","Agustus","Oktober","November","Desember"],
                                                    datasets: [
                                                        {
                                                            label: "Pembelian",
                                                            backgroundColor: "rgba(38, 185, 154, 0.31)",
                                                            borderColor: "rgba(38, 185, 154, 0.7)",
                                                            pointBorderColor: "rgba(38, 185, 154, 0.7)",
                                                            pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                                                            pointHoverBackgroundColor: "#fff",
                                                            pointHoverBorderColor: "rgba(220,220,220,1)",
                                                            pointBorderWidth: 1,
                                                            data: hasilLaki
                                                        }
                                                    ]
                                                };
                                                console.log(chartData);
                                                var ctx = document.getElementById("rugi");
                                                var lineGraph = new Chart(ctx, {
                                                    type: 'line',
                                                    data: chartData,
                                                    options: {
                                                        scales: {
                                                            yAxes: [{
                                                                ticks: {
                                                                    beginAtZero: true
                                                                }
                                                            }]
                                                        }
                                                    }
                                                });
                                            },
                                            error: function (data) {
                                                console.log(data);
                                            }
                                        });

                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <?php
    include '../sections/footer.php';
    ?>
