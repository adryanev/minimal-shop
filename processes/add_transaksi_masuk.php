<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 31/12/2017
 * Time: 11.07
 */
session_start();

require "../config/db.php";
if(isset($_POST['tambah_transaksi'])){

    $date = date('Y-m-d');
    $total = 0;

    $sql = "INSERT INTO transaksi_masuk(tgl_transaksi_masuk, total_transaksi_masuk) VALUES (?,?)";
    $prepare = $dbConnection->prepare($sql);
    $prepare->bind_param("sd",$date,$total);

    $ressult = $prepare->execute();

    if($ressult){
        echo "<script>window.location='../views/$_SESSION[level]/pages/penjualan.php';</script>";
    }
    else{
        echo mysqli_error($dbConnection);
    }
}