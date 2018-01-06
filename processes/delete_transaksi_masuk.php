<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 31/12/2017
 * Time: 10.48
 */

session_start();
require "../config/db.php";

$id_transaksi_masuk = $_GET['id'];

$sql = "DELETE FROM transaksi_masuk WHERE id_transaksi_masuk = $id_transaksi_masuk";

$result = mysqli_query($dbConnection,$sql);
if($result){
    echo "<script>window.location='../views/$_SESSION[level]/pages/penjualan.php';</script>";
}