<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 31/12/2017
 * Time: 11.00
 */
?>
<!-- Sart Modal -->
<div class="modal fade" id="input_transaksi_masuk_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">clear</i>
                </button>
                <h4 class="modal-title">Tambahkan Transaksi Detail</h4>
            </div>
            <div class="modal-body">
                <form action="../../../processes/add_transaksi_masuk_detail.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="id_transaksi_masuk" name="id_transaksi_masuk" value="">
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
									<i class="material-icons">store</i>
								</span>
                            <input type="number" name="jumlah_barang" class="form-control" placeholder="Jumlah Barang">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambahkan Detail</button>
                        <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  End Modal -->
