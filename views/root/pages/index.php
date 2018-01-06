<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 23/12/2017
 * Time: 23.33
 */
session_start();
if($_SESSION['level']!= "root"){
    echo "<script>window.location='../../".$_SESSION['level']."/index.php';</script>";
}
$current_page = "beranda";
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
                            <h1>Beranda</h1>
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
                        <h2>Info</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-nav-tabs">
                                <div class="header header-success">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="active">
                                                    <a href="#jumlah_barang" data-toggle="tab">
                                                        <i class="material-icons">store</i>
                                                        Barang hampir habis
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="content">
                                    <div class="tab-content text-center">
                                        <div class="tab-pane active" id="jumlah_barang">
                                            <table id="tabel_transaksi_masuk" class="table table-responsive dataTable ">

                                                <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Stok</th>
                                                </tr>


                                                </thead>
                                                <tbody>
                                                <?php

                                                $sql = "SELECT * FROM barang where jumlah_barang < 5";
                                                $result = mysqli_query($dbConnection,$sql);

                                                if(mysqli_num_rows($result)>0){
                                                    $counter = 1;

                                                    while ($row = mysqli_fetch_assoc($result)){
                                                        echo "<tr>";

                                                        echo "<td>" .$counter."</td>";
                                                        echo "<td >" .$row['nama_barang'] .  "</td>";
                                                        echo "<td>" .$row['jumlah_barang'] . "</td>";

                                                        echo "</tr>";


                                                        $counter++;
                                                    }
                                                }else{

                                                    echo "<p>Tidak ada barang yang hampir habis.</p>";
                                                }

                                                ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-nav-tabs">
                                <div class="header header-primary">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="active">
                                                    <a href="#total_penjualan" data-toggle="tab">
                                                        <i class="material-icons">attach_money</i>
                                                        Penjualan Bulan Ini
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="content">
                                    <div class="tab-content text-center">
                                        <div class="tab-pane active" id="total_penjualan">
                                            <?php
                                            $year = date('Y');
                                            $month = date('m');
                                            $now = date('d');
                                            $sql = "SELECT SUM(total_transaksi_masuk) as total from transaksi_masuk WHERE tgl_transaksi_masuk BETWEEN  '$year-$month-01' AND '$year-$month-$now'";
                                            $result = mysqli_query($dbConnection,$sql);
                                            $row = mysqli_fetch_assoc($result);

                                            echo "<h3>Rp ".number_format($row['total'],2)." </h3>";
                                            ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-nav-tabs">
                                <div class="header header-info">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="active">
                                                    <a href="#pengeluaran" data-toggle="tab">
                                                        <i class="material-icons">money_off</i>
                                                        Pengeluaran Bulan Ini
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="content">
                                    <div class="tab-content text-center">
                                        <div class="tab-pane active" id="pengeluaran">
                                            <?php
                                            $year = date('Y');
                                            $month = date('m');
                                            $now = date('d');
                                            $sql = "SELECT SUM(total_transaksi_keluar) as total from transaksi_keluar WHERE tgl_transaksi_keluar BETWEEN  '$year-$month-01' AND '$year-$month-$now'";
                                            $result = mysqli_query($dbConnection,$sql);
                                            $row = mysqli_fetch_assoc($result);

                                            echo "<h3>Rp ".number_format($row['total'],2)." </h3>";
                                            ?>                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>



                 </div>

            </div>
    </div>



<?php
include '../sections/footer.php';