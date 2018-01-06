<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 31/12/2017
 * Time: 15.58
 */
session_start();

require "../config/db.php";
if(isset($_POST['tambah_transaksi'])){

    $date = date('Y-m-d');
    $total = 0;

    $sql = "INSERT INTO transaksi_keluar(tgl_transaksi_keluar, total_transaksi_keluar) VALUES (?,?)";
    $prepare = $dbConnection->prepare($sql);
    $prepare->bind_param("sd",$date,$total);

    $ressult = $prepare->execute();

    if($ressult){
        echo "<script>window.location='../views/$_SESSION[level]/pages/pembelian.php';</script>";
    }
    else{
        echo mysqli_error($dbConnection);
    }
}