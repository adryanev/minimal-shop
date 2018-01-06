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
$current_page="penjualan";
require '../../../config/db.php';
require '../sections/header.php';
require '../sections/navigation.php';
$id_transaksi_masuk = $_GET['id'];
?>
    <script>
        $(document).ready( function () {
            $('#tabel_detail_transaksi_masuk').DataTable();
        } );
    </script>
    <div class="wrapper">
        <div class="header header-filter" style="background-image: url('../../assets/img/bg2.jpeg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="brand">
                            <h1>Penjualan</h1>
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
                        <h2>Detail Transaksi Penjualan #<?php echo $id_transaksi_masuk;?></h2>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="tabel_detail_transaksi_masuk" class="table table-responsive dataTable ">

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
                                $sql = "SELECT barang.nama_barang, barang.harga_jual, transaksi_masuk_detail.banyak from transaksi_masuk_detail inner join barang on barang.id_barang = transaksi_masuk_detail.id_barang WHERE id_transaksi_masuk = $id_transaksi_masuk";
                                $result = mysqli_query($dbConnection,$sql);

                                if(mysqli_num_rows($result)>0){
                                    $counter = 1;

                                    while ($row = mysqli_fetch_assoc($result)){
                                        echo "<tr>";
                                        $sum += $row['banyak']*$row['harga_jual'];
                                        echo "<td>" .$counter."</td>";
                                        echo "<td >" .$row['nama_barang'] .  "</td>";
                                        echo "<td>" .number_format($row['harga_jual'],2) . "</td>";
                                        echo "<td>" .$row['banyak'] . "</td>";
                                        echo "<td>" .number_format($row['banyak']*$row['harga_jual'],2) . "</td>";

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