<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 24/12/2017
 * Time: 01.06
 */

session_start();

unset($_SESSION['login']);
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['nama']);
unset($_SESSION['level']);

$_SESSION = array();
session_unset();
session_destroy();

echo "<script>
                window.location='../views/login.php';</script>";