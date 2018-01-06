<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 31/12/2017
 * Time: 00.03
 */

session_start();
require "../config/db.php";
$login_now = $_SESSION['level'];
$id_akun = $_GET['id'];

$sql = "DELETE FROM akun WHERE id_akun= $id_akun";
if($_SESSION['level'] != "root"){
    echo "<script>alert('Anda tidak memiliki hak akses untuk melakukan ini.');
window.location='../views/$_SESSION[level]/pages/index.php';
</script>";
}
else{
    $result = mysqli_query($dbConnection,$sql);
    if($result){
        echo "<script>alert('Akun sudah dihapus');
window.location='../views/$_SESSION[level]/pages/akun.php';
</script>";
    }
    else{

        echo "<script>alert('Akun gagal dihapus.');
window.location='../views/$_SESSION[level]/pages/akun.php';
</script>";
    }
}