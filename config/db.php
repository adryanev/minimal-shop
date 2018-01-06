<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 18/12/2017
 * Time: 21.38
 */
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'tugas_sti';
$dbConnection = mysqli_connect($server, $username, $password,$database);
if(mysqli_connect_errno()){
    echo "Gagal terhubung ke database: " . mysqli_connect_error();
}
mysqli_select_db($dbConnection,$database) or die("Database tidak ditemukan." . mysqli_error($dbConnection));
?>