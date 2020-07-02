
<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h3 class="text-center">Pesanan</h3>
				<div class="card shadow">
					<div class="card-body">

						<div class="row">
							<div class="col-lg-7">
								<?= $this->session->flashdata('pesan'); ?>
							</div>
							<div class="col-lg-5">
								<form action="" method="post">
									<div class="input-group mb-2">
										<input type="text" class="form-control border-primary small" placeholder="Cari Berdasarkan ID Lengkap..." aria-label="Search" aria-describedby="basic-addon2" name="cari">
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
									<th>ID</th>
									<th>Nama</th>
									<th>Total Item</th>
									<th>Total Harga</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($pesan as $key) { ?>
									<tr>
										<td><?= $key['id']; ?></td>
										<td><?= $key['nama']; ?></td>
										<td><?= $key['jumlah']; ?></td>
										<td>Rp. <?= $key['total']; ?></td>
										<td><?= $key['status']; ?></td>
										<td>
											<div class="btn-group">
												<button type="button" class="btn btn-info btn-rounded btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="<?= base_url('dashboard/detail_pesan/') . $key['id']; ?>"><i class="fas fa-arrow-right"></i> Detail</a>
													<a class="dropdown-item" href="<?= base_url('dashboard/edit_pesan/') . $key['id']; ?>"><i class="fa fa-edit"></i> Edit</a>
													<a class="dropdown-item" href="<?= base_url('dashboard/hapus_pesanan/') . $key['id']; ?>" onclick="return confirm('Apakah anda yakin?');"><i class="fa fa-trash"></i> Hapus</a>
												</div>
											</div>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>
