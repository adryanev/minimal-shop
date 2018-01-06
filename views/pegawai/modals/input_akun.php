<?php
/**
 * Created by PhpStorm.
 * User: ibalmard
 * Date: 31/12/2017
 * Time: 00.10
 */

?>
<!-- Sart Modal -->
<div class="modal fade" id="add_akun" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">clear</i>
                </button>
                <h4 class="modal-title">Tambahkan Akun</h4>
            </div>
            <div class="modal-body">
                <form action="../../../processes/add_akun.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">person</i>
								</span>
                            <input type="text" name="nama" class="form-control" placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">perm_identity</i>
								</span>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">lock</i>
								</span>
                            <input type="password" name="password" class="form-control" placeholder="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">gavel</i>
								</span>
                           <div class="radio">
                               <label>
                                   <input type="radio" name="level" value="1">
                                   Owner
                               </label>
                               <label><input type="radio" name="level" value="2">Pegawai</label>

                        </div>
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
