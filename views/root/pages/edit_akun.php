<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 31/12/2017
 * Time: 00.02
 */

session_start();
if($_SESSION['level']!= "root"){
    echo "<script>window.location='../../".$_SESSION['level']."/index.php';</script>";
}
$current_page="akun";
require '../../../config/db.php';
require '../sections/header.php';
require '../sections/navigation.php';
$id_akun = $_GET['id'];
?>
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
                    <h2>Edit Akun</h2>
                </div>

                <?php
                $sql = "SELECT * FROM akun WHERE id_akun = $id_akun";
                $result = mysqli_query($dbConnection, $sql);
                $row = mysqli_fetch_assoc($result);
                ?>

                <form action="../../../processes/update_akun.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                            <input type="hidden" name="id_akun" class="form-control" value="<?php echo $row['id_akun']; ?>">
                    </div>

                    <div class="form-group">
                        <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">person</i>
								</span>
                            <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $row['nama']; ?>" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">perm_identity</i>
								</span>
                            <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $row['username']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">lock</i>
								</span>
                            <input type="password" name="password" class="form-control" placeholder="password" value="<?php echo $row['password']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">gavel</i>
								</span>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="level" value="1" <?php if($row['level'] == 1) echo "checked = 'true'";?>>
                                    Owner
                                </label>
                                <label><input type="radio" name="level" value="2" <?php if($row['level'] == 2) echo "checked = 'true'";?>>Pegawai</label>

                            </div>
                        </div>
                    </div>
                        <button type="submit" name="save" class="btn btn-primary">Perbarui Akun</button>

                </form>

                    </div>
                </div>
            </div>

        </div>
    </div>



    <?php
    include '../sections/footer.php';
    ?>





