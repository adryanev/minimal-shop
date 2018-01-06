<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 31/12/2017
 * Time: 11.20
 */
session_start();
require "../config/db.php";
$id_transaksi_masuk = $_POST['id_transaksi_masuk'];
$barcode = $_POST['barcode'];
$jumlah = $_POST['jumlah_barang'];

$sqlBarang = "SELECT id_barang, harga_jual from barang where barcode= '$barcode'";

$result_barang = mysqli_query($dbConnection,$sqlBarang);
$rowBarang = mysqli_fetch_assoc($result_barang);

$idBarang = $rowBarang['id_barang'];
$hargaJual = $rowBarang['harga_jual'];

$sqlInsertDetail = "INSERT INTO transaksi_masuk_detail (id_transaksi_masuk, id_barang,banyak ) VALUES ($id_transaksi_masuk,$idBarang,$jumlah)";
$resultInsertDetail = mysqli_query($dbConnection,$sqlInsertDetail);

if($resultInsertDetail){
    $sqlUpdateTotal = "UPDATE transaksi_masuk SET total_transaksi_masuk = total_transaksi_masuk + ($hargaJual*$jumlah) WHERE id_transaksi_masuk = $id_transaksi_masuk";
    $resultUpdate= mysqli_query($dbConnection,$sqlUpdateTotal);
    if($resultUpdate){

        $sqlUpdateBarang = "UPDATE barang SET jumlah_barang = jumlah_barang - $jumlah";
        $resultUpdateBarang  = mysqli_query($dbConnection,$sqlUpdateBarang);

        if($resultUpdateBarang){
            echo "<script>window.location='../views/$_SESSION[level]/pages/penjualan.php';</script>";
        }
        else{
            echo "gagal update stok barang";
        }

    }else{
        echo "Gagal_update_total_belanja";
    }
} else{
    echo "GAGAL insert transaksi";
}