<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 31/12/2017
 * Time: 01.30
 */
session_start();
require "../config/db.php";
$login_now = $_SESSION['level'];
$barcode = $_POST['barcode'];
$nama_barang = $_POST['nama_barang'];
$jumlah_barang = $_POST['jumlah_barang'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];


$sql = "INSERT INTO barang (barcode, nama_barang, jumlah_barang, harga_beli, harga_jual) VALUES(?,?,?,?,?)";
$prepare = $dbConnection->prepare($sql);
$prepare->bind_param("ssddd",$barcode,$nama_barang,$jumlah_barang,$harga_beli,$harga_jual);

$query = $prepare->execute();

if($query){
    echo "<script>alert('Penambahan barang berhasil');
                window.location='../views/$_SESSION[level]/pages/barang.php';</script>";
}
else{
    echo "<script>alert('Penambahan barang gagal');
                window.location='../views/$_SESSION[level]/pages/barang.php';</script>";
}