<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 31/12/2017
 * Time: 10.40
 */
session_start();
if($_SESSION['login']!= true){
    echo "<script>window.location='../../".$_SESSION['level']."/index.php';</script>";
}
$current_page="pembelian";
require '../../../config/db.php';
require '../sections/header.php';
require '../sections/navigation.php';
$id_transaksi_keluar = $_GET['id'];
?>
    <script>
        $(document).ready( function () {
            $('#tabel_detail_transaksi_keluar').DataTable();
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
                        <h2>Detail Transaksi Pembelian #<?php echo $id_transaksi_keluar;?></h2>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="tabel_detail_transaksi_keluar" class="table table-responsive dataTable ">

                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Barang</th>
                                    <th>Harga</th>
                                    <th>Banyak</th>
                                    <th>Total</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $sum = 0;
                                $sql = "SELECT barang.nama_barang, barang.harga_beli, transaksi_keluar_detail.banyak from transaksi_keluar_detail inner join barang on barang.id_barang = transaksi_keluar_detail.id_barang WHERE id_transaksi_keluar = $id_transaksi_keluar";
                                $result = mysqli_query($dbConnection,$sql);

                                if(mysqli_num_rows($result)>0){
                                    $counter = 1;

                                    while ($row = mysqli_fetch_assoc($result)){
                                        echo "<tr>";
                                        $sum += $row['banyak']*$row['harga_beli'];
                                        echo "<td>" .$counter."</td>";
                                        echo "<td >" .$row['nama_barang'] .  "</td>";
                                        echo "<td>" .number_format($row['harga_beli'],2) . "</td>";
                                        echo "<td>" .$row['banyak'] . "</td>";
                                        echo "<td>" .number_format($row['banyak']*$row['harga_beli'],2) . "</td>";

                                        echo "</tr>";


                                        $counter++;
                                    }

                                    echo "<tfoot>
<tr>
<td></td>
<td></td>
<td></td>
<td>Total</td>
<td>".number_format($sum,2)."</td>
</tr>
</tfoot>";


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