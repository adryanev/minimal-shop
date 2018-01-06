<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 24/12/2017
 * Time: 00.04
 */

session_start();
if($_SESSION['login']!= true ){
    echo "<script>window.location='../../".$_SESSION['level']."/index.php';</script>";
}
$current_page="pembelian";
require '../../../config/db.php';
require '../sections/header.php';
require '../sections/navigation.php';
?>
<script>
    $(document).ready( function () {
        $('#tabel_transaksi_keluar').DataTable();
    } );
</script>
<div class="wrapper">
    <div class="header header-filter" style="background-image: url('../../assets/img/bg2.jpeg');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="brand">
                        <h1>Pembelian</h1>
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
                    <h2>Daftar Transaksi Pembelian</h2>

                </div>
                <div class="row">
                    <form action="../../../processes/add_transaksi_keluar.php" method="post">
                        <input type="submit" class="btn btn-primary" name="tambah_transaksi" value="Tambah Transaksi">
                    </form>


                    <div class="col-md-12">
                        <table id="tabel_transaksi_keluar" class="table table-responsive dataTable ">

                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Transaksi</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>


                            </thead>
                            <tbody>
                            <?php

                            $sql = "SELECT * FROM transaksi_keluar";
                            $result = mysqli_query($dbConnection,$sql);

                            if(mysqli_num_rows($result)>0){
                                $counter = 1;

                                while ($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";

                                    echo "<td>" .$counter."</td>";
                                    echo "<td >" .$row['tgl_transaksi_keluar'] .  "</td>";
                                    echo "<td>" .number_format($row['total_transaksi_keluar'],2) . "</td>";
                                    echo "<td>
                                    <button class=\"btn btn-primary btn-xs id_transaksi_keluar\" data-toggle=\"modal\" data-target=\"#input_transaksi_keluar_detail\" data-id=\"".$row['id_transaksi_keluar']."\"><i class=\"fa fa-plus\"></i></button>
                                    <a href=\"view_transaksi_keluar.php?id=".$row['id_transaksi_keluar']."\"><button type=\"button\" class=\"btn btn-success btn-xs\"><i class=\"fa fa-eye\"></i></button></a>
                                    <a href=\"../../../processes/delete_transaksi_keluar.php?id=".$row['id_transaksi_keluar']."\"><button type=\"button\" class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash\"></i></button>
                                    </td>";
                                    echo "</tr>";


                                    $counter++;
                                }
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('body').on('click', '.id_transaksi_keluar',function(){
                document.getElementById("id_transaksi_keluar").value = $(this).attr('data-id');
                console.log($(this).attr('data-id'));
            });
        });
    </script>

    <?php
    include '../sections/footer.php';
    include "../modals/input_transaksi_keluar_detail.php";

    ?>
