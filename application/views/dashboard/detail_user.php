
<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h3 class="text-center">Detail User</h3>
				<div class="card shadow">
					<div class="row no-gutters">
						<div class="col-lg-5">
							<img src="<?= base_url('assets/img/') . $user['img']; ?>" class="img-thumbnail">
						</div>
						<div class="col-lg-7">
							<div class="card-body">
								<p>Nama User : <?= $user['nama']; ?></p>
								<p>Email : <?= $user['email']; ?></p>
								<p>No Telp : <?= $user['no_telp']; ?></p>
								<p>Jenis Kelamin : <?= $user['jk']; ?></p>
								<?php if($user['aktif'] == 1): ?>
									<p>Aktif : Ya</p>
									<?php else: ?>
										<p>Aktif : Tidak</p>
									<?php endif; ?>
									<small class="text-muted">Bergabung Pada <?= date('d M Y',$user['tgl_bergabung']); ?></small>

								</div>
							</div>
						</div>
						<div class="row justify-content-end mb-3 mr-3">
							<a href="<?= base_url('dashboard/user'); ?>" class="btn btn-dark btn-rounded">Kembali</a>
						</div>
					</div>
				</div>
			</div>
		</div>
