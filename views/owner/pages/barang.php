<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 30/12/2017
 * Time: 23.51
 */
session_start();
if($_SESSION['login']!= true){
    echo "<script>window.location='../../".$_SESSION['level']."/index.php';</script>";
}
$current_page="barang";
require '../../../config/db.php';
require '../sections/header.php';
require '../sections/navigation.php';
?>
    <script>
        $(document).ready( function () {
            $('#tabel_barang').DataTable({
                select:true
            });
        } );
    </script>
<div class="wrapper">
    <div class="header header-filter" style="background-image: url('../../assets/img/bg2.jpeg');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="brand">
                        <h1>Barang</h1>
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
                    <h2>Barang</h2>
                </div>
                <div class="row">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#add_barang">
                        Tambah Barang
                    </button>

                    <div class="col-md-12">
                        <table id="tabel_barang" class="table table-responsive dataTable ">

                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Barcode</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Aksi</th>
                            </tr>


                            </thead>
                            <tbody>
                            <?php

                            $sql = "SELECT * FROM barang";
                            $result = mysqli_query($dbConnection,$sql);

                            if(mysqli_num_rows($result)>0){
                                $counter = 1;

                                while ($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";

                                    echo "<td>" .$counter."</td>";
                                    echo "<td >" .$row['barcode'] .  "</td>";
                                    echo "<td>" .$row['nama_barang'] . "</td>";
                                    echo "<td align=\"center\">" .$row['jumlah_barang'] . "</td>";
                                    echo "<td align=\"center\">" . $row['harga_beli'] . "</td>";
                                    echo "<td align=\"center\">" . $row['harga_jual'] . "</td>";
                                    echo "<td>
                                    <a href=\"edit_barang.php?id=".$row['id_barang']."\"><button type=\"button\" class=\"btn btn-info btn-xs\"><i class=\"fa fa-edit\"></i></button></a>
                                  
                                    <a href=\"../../../processes/delete_barang.php?id=".$row['id_barang']."\"><button type=\"button\" class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash\"></i></button>
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




    <?php
    include '../sections/footer.php';
    ?>
<?php include "../modals/input_barang.php";?>