<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 31/12/2017
 * Time: 01.59
 */

session_start();
require "../config/db.php";
$login_now = $_SESSION['login'];
$id_barang = $_GET['id'];

$sql = "DELETE FROM barang WHERE id_barang= $id_barang";
if($_SESSION['level'] != true){
    echo "<script>alert('Anda tidak memiliki hak akses untuk melakukan ini.');
window.location='../views/$_SESSION[level]/pages/index.php';
</script>";
}
else{
    $result = mysqli_query($dbConnection,$sql);
    if($result){
        echo "<script>alert('Barang sudah dihapus');
window.location='../views/$_SESSION[level]/pages/barang.php';
</script>";
    }
    else{

        echo "<script>alert('Barang gagal dihapus.');
window.location='../views/$_SESSION[level]/pages/barang.php';
</script>";
    }
}