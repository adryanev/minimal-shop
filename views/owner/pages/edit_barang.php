<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 31/12/2017
 * Time: 01.50
 */

session_start();
if($_SESSION['login']!= true){
    echo "<script>window.location='../../".$_SESSION['level']."/index.php';</script>";
}
$current_page="barang";
require '../../../config/db.php';
require '../sections/header.php';
require '../sections/navigation.php';
$id = $_GET['id'];
?>
    <div class="wrapper">
    <div class="header header-filter" style="background-image: url('../../assets/img/bg2.jpeg');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="brand">
                        <h1>Barang</h1>
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
                    <h2>Barang</h2>
                </div>

                <?php

                $sql = "SELECT * FROM barang where id_barang = $id";
                $result = mysqli_query($dbConnection,$sql);
                $row = mysqli_fetch_assoc($result);
                ?>

                <form action="../../../processes/update_akun.php" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id_barang" class="form-control" placeholder="id_barang" value="<?php echo $row['id_barang'];?>">
                    <div class="form-group">
                        <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">code</i>
								</span>
                            <input type="text" name="barcode" class="form-control" placeholder="Barcode" value="<?php echo $row['barcode'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">card_giftcard</i>
								</span>
                            <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?php echo $row['nama_barang'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">store</i>
								</span>
                            <input type="number" name="jumlah_barang" class="form-control" placeholder="Jumlah Barang" value="<?php echo $row['jumlah_barang'];?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">attach_money</i>
								</span>
                            <input type="number" name="harga_beli" class="form-control" placeholder="Harga Beli" value="<?php echo $row['harga_beli'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">monetization_on</i>
								</span>
                            <input type="number" name="harga_jual" class="form-control" placeholder="Harga Jual" value="<?php echo $row['harga_jual'];?>">
                        </div>
                    </div>
                        <button type="submit" name="save" class="btn btn-primary">Perbarui Barang</button>


                </form>

        </div>
    </div>




<?php
include '../sections/footer.php';
?>