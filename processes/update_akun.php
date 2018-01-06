<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 31/12/2017
 * Time: 00.50
 */
session_start();
require "../config/db.php";
$login_now = $_SESSION['level'];
$id_akun = $_POST['id_akun'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = hash('sha256',$_POST['password']);
$level = $_POST['level'];
$now = date('Y-m-d h:i:s');

$sql = "UPDATE akun SET nama = ?, username = ?, password = ?, level = ?, update_at = ? WHERE id_akun = ? ";
$prepare = $dbConnection->prepare($sql);
$prepare->bind_param("sssdsd",$nama,$username,$password,$level,$now,$id_akun);

$query = $prepare->execute();

if($query){
    echo "<script>alert('Perbaruan akun berhasil');
                window.location='../views/$_SESSION[level]/pages/akun.php';</script>";
}
else{

    echo "<script>alert('Perbaruan akun gagal');
               window.location='../views/$_SESSION[level]/pages/akun.php';</script>";
}