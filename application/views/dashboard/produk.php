
<div class="page-wrapper">
	<div class="container-fluid">
		<h3 class="text-center">Management Produk</h3>
		<div class="row">
			<div class="col-12">
				<div class="card shadow">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-7">
								<?= $this->session->flashdata('pesan'); ?>
							</div>
							<div class="col-lg-5">
								<form action="" method="post">
									<div class="input-group mb-2">
										<input type="text" class="form-control border-primary small" placeholder="Cari Produk..." aria-label="Search" aria-describedby="basic-addon2" name="cari">
										<div class="input-group-append">
											<button class="btn btn-primary" type="submit">
												<i class="fa fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>

						<table class="table table-hover">
							<thead class="bg-dark text-light">
								<tr>
									<th>No</th>
									<th>Produk</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								foreach ($produk as $p) { ?>
									<tr>
										<td><?= $i++; ?></td>
										<td><?= $p['produk']; ?></td>
										<td>
											<a href="<?= base_url('dashboard/edit_produk/') . $p['id']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>

											<a href="<?= base_url('dashboard/hapus_produk/') . $p['id']; ?>" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>

						<div class="row justify-content-end fixed-bottom mb-5 mr-5">
							<button class="btn btn-info btn-rounded" data-toggle="modal" data-target="#Modal2"><i class="fa fa-plus"></i></button>
						</div> 

					</div>
				</div>

			</div>
		</div>
	</div>



	<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-dark text-light">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
					<button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('dashboard/tambah_produk'); ?>" method="post">
					<div class="modal-body">
						<input type="text" name="produk" id="produk" placeholder="Nama Produk" class="form-control" autocomplete="off">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>