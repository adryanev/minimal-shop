<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 15/12/2017
 * Time: 23.52
 */
?>
<body class="index-page">


<!-- Navbar -->
<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../pages/index.php">Point Of Sale</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right" id="nav-ul">
                <li class="<?php if($current_page == "beranda") echo "active";?>" id="dashboard"><a href="../pages/index.php">Beranda</a></li>
                <li class="<?php if($current_page == "barang") echo "active";?>" id="dashboard"><a href="../pages/barang.php">Barang</a></li>

                <li class="<?php if($current_page == "penjualan") echo "active";?>" id="penjualan">
                    <a href="../pages/penjualan.php">Penjualan</a></li>
                <li class="<?php if($current_page == "pembelian") echo "active";?>" id="pembelian"><a href="../pages/pembelian.php">Pembelian</a></li>
                <li class="<?php if($current_page == "laporan") echo "active";?>" id="laporan"><a href="../pages/laporan.php">Laporan</a></li>
                <li class="<?php if($current_page == "akun") echo "active";?>" id="akun"><a href="../pages/akun.php">Akun</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['nama'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="../../../processes/logout.php">Keluar</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- end navbar -->
