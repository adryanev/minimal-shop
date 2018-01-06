<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 31/12/2017
 * Time: 01.35
 */
?>

<!-- Sart Modal -->
<div class="modal fade" id="add_barang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">clear</i>
                </button>
                <h4 class="modal-title">Tambahkan Barang</h4>
            </div>
            <div class="modal-body">
                <form action="../../../processes/add_barang.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">code</i>
								</span>
                            <input type="text" name="barcode" class="form-control" placeholder="Barcode">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">card_giftcard</i>
								</span>
                            <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">store</i>
								</span>
                            <input type="number" name="jumlah_barang" class="form-control" placeholder="Jumlah Barang">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">attach_money</i>
								</span>
                            <input type="number" name="harga_beli" class="form-control" placeholder="Harga Beli">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">monetization_on</i>
								</span>
                            <input type="number" name="harga_jual" class="form-control" placeholder="Harga Jual">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Buat Akun</button>
                        <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  End Modal -->

