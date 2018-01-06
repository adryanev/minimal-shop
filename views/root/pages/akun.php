<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 24/12/2017
 * Time: 01.02
 */

session_start();
if($_SESSION['level']!= "root"){
    echo "<script>window.location='../../".$_SESSION['level']."/index.php';</script>";
}
$current_page="akun";
require '../../../config/db.php';
require '../sections/header.php';
require '../sections/navigation.php';
?>
<script>
    $(document).ready( function () {
        $('#tabel_akun').DataTable({
            select:true
        });
    } );
</script>
<div class="wrapper">
    <div class="header header-filter" style="background-image: url('../../assets/img/bg2.jpeg');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="brand">
                        <h1>Akun</h1>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- you can use the class main-raised if you want the main area to be as a page with shadows -->
    <div class="main main-raised">
        <div class="section section-basic">
            <div class="container">
                <div class="title">
                    <h2>Akun</h2>
                </div>
                <div class="row">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#add_akun">
                       Tambah Akun
                    </button>

                    <div class="col-md-12">
                        <table id="tabel_akun" class="table table-responsive dataTable ">

                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Akun</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Tanggal Dibuat</th>
                                <th>Terakhir Diperbarui</th>
                                <th>Aksi</th>
                            </tr>


                            </thead>
                            <tbody>
                            <?php

                            $sql = "SELECT * FROM akun";
                            $result = mysqli_query($dbConnection,$sql);

                            if(mysqli_num_rows($result)>0){
                                $counter = 1;

                                while ($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";

                                    echo "<td align='center'>" .$counter."</td>";
                                    echo "<td align=\"center\">" .$row['id_akun'] .  "</td>";
                                    echo "<td>" .$row['nama'] . "</td>";
                                    echo "<td>" .$row['username'] . "</td>";
                                    echo "<td align=\"center\">" . $row['level'] . "</td>";
                                    echo "<td align=\"center\">" . $row['created_at'] . "</td>";
                                    echo "<td align=\"center\">" . $row['update_at'] . "</td>";
                                    echo "<td align=\"center\">
                                    <a href=\"edit_akun.php?id=".$row['id_akun']."\"><button type=\"button\" class=\"btn btn-success btn-xs\"><i class=\"fa fa-edit\"></i></button></a>
                                    <a href=\"../../../processes/delete_akun.php?id=".$row['id_akun']."\"><button type=\"button\" class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash\"></i></button>
                                    </td>";
                                    echo "</tr>";

                                    $counter++;
                                }
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <?php
    include '../sections/footer.php';
    ?>
    <?php include "../modals/input_akun.php";?>
