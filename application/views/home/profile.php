<div class="container">
	<div class="row mt-3">
		<div class="col-lg-12">
			<div class="card shadow mb-5">
				<div class="card-body">
					<h3 class="text-primary text-center">Proifile</h3>
					<?= $this->session->flashdata('pesan'); ?>
					<div class="row">
						<div class="col-md-3">
							<img src="<?= base_url('assets/img/') . $user['img']; ?>" class="img-thumbnail">
						</div>
						<div class="col-lg-7 ml-3">
							<p>Nama : <?= $user['nama']; ?></p>
							<p>No Telp : <?= $user['no_telp']; ?></p>
							<p>Email : <?= $user['email']; ?></p>
							<p>Jenis Kelamin : <?= $user['jk']; ?></p>
							<small class="text-muted">Bergabung Pada <?= date('d M Y',$user['tgl_bergabung']); ?></small>
						</div>
					</div>
					<div class="row justify-content-end">
						<a href="<?= base_url('home/edit_profile'); ?>" class="btn btn-primary btn-sm">Edit Profile</a>
						<a href="<?= base_url('home/change_pass'); ?>" class="btn btn-info btn-sm">Ubah Password</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>