<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 31/12/2017
 * Time: 10.59
 */

session_start();
require "../config/db.php";

$id_transaksi_keluar = $_GET['id'];

$sql = "DELETE FROM transaksi_keluar WHERE id_transaksi_keluar = $id_transaksi_keluar";

$result = mysqli_query($dbConnection,$sql);
if($result){
    echo "<script>window.location='../views/$_SESSION[level]/pages/pembelian.php';</script>";
}