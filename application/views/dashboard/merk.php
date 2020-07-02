 <div class="page-wrapper">
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-12">

 				<h3 class="text-center">Management Merk</h3>

 				<div class="card shadow">
 					<div class="card-body">
 						<div class="row">
 							<div class="col-lg-7">
 								<?= $this->session->flashdata('pesan'); ?>
 							</div>
 							<div class="col-lg-5">
 								<form action="" method="post">
 									<div class="input-group mb-2">
 										<input type="text" class="form-control border-primary small" placeholder="Cari Merk..." aria-label="Search" aria-describedby="basic-addon2" name="cari">
 										<div class="input-group-append">
 											<button class="btn btn-primary" type="submit">
 												<i class="fa fa-search fa-sm"></i>
 											</button>
 										</div>
 									</div>
 								</form>
 							</div>
 						</div>
 						<?php if(empty($merk)): ?>
 							<div class="alert alert-danger">Tidak Ditemukan</div>
 						<?php endif; ?>
 						<table class="table table-striped">
 							<thead class="bg-dark text-light">
 								<tr>
 									<th>No</th>
 									<th>Merk</th>
 									<th>Action</th>
 								</tr>
 							</thead>
 							<tbody>
 								<?php 
 								$i = 1;
 								foreach ($merk as $m) { ?>
 									<tr>
 										<td><?= $i++; ?></td>
 										<td><?= $m['merk']; ?></td>
 										<td>
 											<a class="btn btn-info btn-sm" href="<?= base_url('dashboard/edit_merk/') . $m['id']; ?>"><i class="fa fa-edit"></i></a>
 											<a href="<?= base_url('dashboard/hapus_merk/') . $m['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?');"><i class="fa fa-trash"></i></a>
 										</td>
 									</tr>
 								<?php } ?>
 							</tbody>
 						</table>
 					</div>
 				</div>
 				<div class="row justify-content-end fixed-bottom mb-5 mr-5">
 					<button class="btn btn-info btn-rounded" type="button" data-toggle="modal" data-target="#Modal2"><i class="fa fa-plus"></i></button>
 				</div>
 			</div>
 		</div>
 	</div>


 	<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 		<div class="modal-dialog" role="document">
 			<div class="modal-content">
 				<div class="modal-header bg-dark text-light">
 					<h5 class="modal-title" id="exampleModalLabel">Tambah Merk</h5>
 					<button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
 						<span aria-hidden="true">&times;</span>
 					</button>
 				</div>
 				<form action="<?= base_url('dashboard/tambah_merk'); ?>" method="post">
 					<div class="modal-body">
 						<input type="text" name="merk" id="merk" placeholder="Nama Merk" class="form-control" autocomplete="off">
 					</div>
 					<div class="modal-footer">
 						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
 						<button type="submit" class="btn btn-primary">Simpan</button>
 					</div>
 				</form>
 			</div>
 		</div>
 	</div>