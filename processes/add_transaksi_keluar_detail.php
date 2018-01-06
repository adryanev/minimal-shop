<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 31/12/2017
 * Time: 15.58
 */
session_start();
require "../config/db.php";
$id_transaksi_keluar = $_POST['id_transaksi_keluar'];
$barcode = $_POST['barcode'];
$jumlah = $_POST['jumlah_barang'];

$sqlBarang = "SELECT id_barang, harga_beli from barang where barcode= '$barcode'";

$result_barang = mysqli_query($dbConnection,$sqlBarang);
$rowBarang = mysqli_fetch_assoc($result_barang);

$idBarang = $rowBarang['id_barang'];
$hargaBeli = $rowBarang['harga_beli'];

$sqlInsertDetail = "INSERT INTO transaksi_keluar_detail(id_transaksi_keluar, id_barang,banyak ) VALUES ($id_transaksi_keluar,$idBarang,$jumlah)";
$resultInsertDetail = mysqli_query($dbConnection,$sqlInsertDetail);

if($resultInsertDetail){
    $sqlUpdateTotal = "UPDATE transaksi_keluar SET total_transaksi_keluar = total_transaksi_keluar + ($hargaBeli*$jumlah) WHERE id_transaksi_keluar = $id_transaksi_keluar";
    $resultUpdate= mysqli_query($dbConnection,$sqlUpdateTotal);
    if($resultUpdate){

        $sqlUpdateBarang = "UPDATE barang SET jumlah_barang = jumlah_barang + $jumlah";
        $resultUpdateBarang  = mysqli_query($dbConnection,$sqlUpdateBarang);

        if($resultUpdateBarang){
            echo "<script>window.location='../views/$_SESSION[level]/pages/pembelian.php';</script>";
        }
        else{
            echo "gagal update stok barang";
        }

    }else{
        echo "Gagal_update_total_belanja";
    }
} else{
    echo mysqli_error($dbConnection);
}