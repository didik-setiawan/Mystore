
<div class="page-wrapper">
	<div class="container-fluid">
		<h3 class="text-center">Management User</h3>
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
										<input type="text" class="form-control border-primary small" placeholder="Cari User..." aria-label="Search" aria-describedby="basic-addon2" name="cari">
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
									<th>Nama</th>
									<th>Img</th>
									<th>Aktif</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								foreach ($user as $u) { ?>
									<tr>
										<td><?= $i++; ?></td>
										<td><?= $u['nama']; ?></td>
										<td><img src="<?= base_url('assets/img/') . $u['img']; ?>" height="30px" width="30px" class="rounded-circle"></td>
										<?php if($u['aktif'] == 1): ?>
											<td>Ya</td>
											<?php else: ?>
												<td>Tidak</td>
											<?php endif; ?>
											<td>
												<div class="btn-group">
													<button type="button" class="btn btn-info btn-rounded btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="<?= base_url('dashboard/detail_user/') . $u['id']; ?>"><i class="fas fa-arrow-right"></i> Detail</a>
														<?php if($u['aktif'] == 1): ?>
															<a class="dropdown-item" href="<?= base_url('dashboard/nonaktifkan_user/') . $u['id']; ?>"><i class="mdi mdi-power"></i> Nonaktifkan</a>
															<?php else: ?>
																<a class="dropdown-item" href="<?= base_url('dashboard/aktifkan_user/') . $u['id']; ?>"><i class="mdi mdi-power"></i> Aktifkan</a>
															<?php endif; ?>
															<a class="dropdown-item" href="<?= base_url('dashboard/hapus_user/') . $u['id']; ?>" onclick="return confirm('Apakah anda yakin?');"><i class="fa fa-trash"></i> Hapus</a>
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
