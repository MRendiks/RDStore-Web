<?php 
	$qb = new lsp();
	$dataB = $qb->select("transaksi");
	if ($_SESSION['level'] != "Manager") {
    header("location:../index.php");
  	}
 ?>
<div class="main-content" style="margin-top: 30px;">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
            	<div class="col-md-12">
            		<div class="card">
            			<div class="card-header">
            				<h3>Transaksi</h3>
            				<br>
            			</div>
            			<div class="card-body">
            				<table class="table table-hover table-bordered" id="sampleTable">
								<thead>
				                  <tr>
								  	<th>ID Transaksi</th>
				                    <th>ID User</th>
				                    <th>Kode Barang</th>
				                    <th>Tanggal Bayar</th>
				                    <th>Total Bayar</th>
				                    <th>Status</th>
				                    <th>Action</th>
				                  </tr>
				                </thead>
				                <tbody>
				                	<?php 
					                  $no = 1;
					                  foreach($dataB as $ds){ ?>
										<tr>
											<td><?= $ds['kd_transaksi'] ?></td>
											<td><?= $ds['kd_user'] ?></td>
											<td><?= $ds['kd_barang'] ?></td>
											<td><?= $ds['tgl_bayar'] ?></td>
											<td><?= $ds['total'] ?></td>
											<td><?= $ds['status'] ?></td>
											<td class="text-center">
                                                <div class="btn-group">
                                                    <a href="?page=viewBarangDetail&id=<?php echo $ds['kd_barang'] ?>" data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-warning"><i class="fa fa-search"></i></a>
                                                    <a href="?page=viewBarangEdit&edit&id=<?= $ds['kd_barang'] ?>" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                    <button data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger">
                                                        <i class="fa fa-trash" id="btdelete<?php echo $no; ?>" ></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <script src="vendor/jquery-3.2.1.min.js"></script>
                                        <script>
                                            $('#btdelete<?php echo $no; ?>').click(function(e){
                                                  e.preventDefault();
                                                    swal({
                                                    title: "Hapus",
                                                    text: "Yakin Hapus?",
                                                    type: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonText: "Yes",
                                                    cancelButtonText: "Cancel",
                                                    closeOnConfirm: false,
                                                    closeOnCancel: true
                                                  }, function(isConfirm) {
                                                    if (isConfirm) {
                                                        window.location.href="?page=kelTransaksi&delete&id=<?php echo $ds['kd_transaksi'] ?>";
                                                    }
                                                  });
                                                });
                                        </script>
										</tr>
					                  <?php $no++; } ?>
				                </tbody>
            				</table>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>