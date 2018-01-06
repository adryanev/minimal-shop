<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 15/12/2017
 * Time: 23.55
 */
session_start();
require '../config/db.php';

if($_SESSION['login'] == true){
    echo "<script>
                window.location='../views/$_SESSION[level]/pages/index.php';</script>";
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Login - Point of Sales</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css" rel="stylesheet"/>

</head>

<body class="signup-page">
<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
    </div>
</nav>

<div class="wrapper">
    <div class="header header-filter" style="background-image: url('assets/img/city.jpg'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="card card-signup">
                        <form class="form" method="post" action="">
                            <div class="header header-primary text-center">
                                <h3>Masuk</h3>
                            </div>
                            <div class="content">

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">account_circle</i>
										</span>
                                    <input type="text" name="username" class="form-control" placeholder="Username...">
                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
                                    <input type="password" name="password" placeholder="Password..." class="form-control" />
                                </div>
                                <!--<p>Tidak punya akun? <a href="signup.php">Daftar di sini.</a> </p> -->
                                <!-- If you want to add a checkbox to this form, uncomment this code

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="optionsCheckboxes" checked>
                                        Subscribe to newsletter
                                    </label>
                                </div> -->
                            </div>
                            <div class="footer text-center">
                                <button type="submit" class="btn btn-primary" name="save">Mulai</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">

            </div>
        </footer>

    </div>

</div>


</body>
<!--   Core JS Files   -->
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js"></script>

<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
<script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="assets/js/material-kit.js" type="text/javascript"></script>

</html>

<?php

    if(isset($_POST['save'])){
        $username = $_POST['username'];
        $password = hash('sha256',$_POST['password']);
        $sql = $dbConnection->prepare("SELECT * from akun WHERE username = ? AND  password = ?");
        $sql->bind_param("ss",$username,$password);
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows !=0){

            while ($row =  $result->fetch_assoc()){
                $_SESSION['login'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['nama'] = $row['nama'];
                $_SESSION['id'] = $row['id_akun'];
                $halaman = null;
                if ($row['level'] == 0){
                    $halaman = "root";

                }elseif ($row['level'] == 1){
                    $halaman= "owner";
                }
                elseif($row['level'] == 2){
                    $halaman = "pegawai";
                }
                $_SESSION['level'] = $halaman;
                echo "<script>alert('Selamat Datang ".$row['nama']."');
                window.location='$halaman/index.php';</script>";
            }
        }
        else{

            echo "<script>alert('Login gagal');</script>";
        }

    }