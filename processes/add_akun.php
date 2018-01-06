<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 31/12/2017
 * Time: 00.12
 */
session_start();
require "../config/db.php";
$login_now = $_SESSION['level'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = hash('sha256',$_POST['password']);
$level = $_POST['level'];
$now = date('Y-m-d h:i:s');

$sql = "INSERT INTO akun (nama, username, password, level, created_at, update_at) VALUES(?,?,?,?,?,?)";
$prepare = $dbConnection->prepare($sql);
$prepare->bind_param("sssdss",$nama,$username,$password,$level,$now,$now);

$query = $prepare->execute();

if($query){
    echo "<script>alert('Pendaftaran akun berhasil');
                window.location='../views/$_SESSION[level]/pages/akun.php';</script>";
}
else{
    echo "<script>alert('Pendaftaran akun gagal');
                window.location='../views/$_SESSION[level]/pages/akun.php';</script>";
}