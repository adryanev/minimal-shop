<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 31/12/2017
 * Time: 01.59
 */

session_start();
require "../config/db.php";
$login_now = $_SESSION['level'];
$id_barang = $_POST['id_barang'];
$barcode = $_POST['barcode'];
$nama_barang = $_POST['nama_barang'];
$jumlah_barang = $_POST['jumlah_barang'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];

    $sql = "UPDATE barang SET barcode = ?, nama_barang = ?, jumlah_barang = ?, harga_beli = ?, harga_jual = ? WHERE id_barang = ? ";
$prepare = $dbConnection->prepare($sql);
$prepare->bind_param("ssddd",$barcode,$nama_barang,$jumlah_barang,$harga_beli,$harga_jual,$id_barang);

$query = $prepare->execute();

if($query){
    echo "<script>alert('Perbarbaruan barang berhasil');
                window.location='../views/$_SESSION[level]/pages/akun.php';</script>";
}
else{

    echo "<script>alert('Perbaruan barang gagal');
               window.location='../views/$_SESSION[level]/pages/akun.php';</script>";
}