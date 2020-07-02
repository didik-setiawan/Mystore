<div class="container">
	<div class="row mt-3">
		<div class="col-lg-12">
			<div class="card shadow">
				<div class="card-body">
					<h3 class="text-primary text-center">Ubah Password</h3>
					<?= $this->session->flashdata('pesan'); ?>
<form action="" method="post">
					<div class="col-lg-6">
						<label>Password Lama</label>
						<?= form_error('pl','<small class="text-danger">','</small>'); ?>
						<input type="password" name="pl" class="form-control"><br>
						<label>Password Baru</label>
						<?= form_error('pb','<small class="text-danger">','</small>'); ?>
						<input type="password" name="pb" class="form-control"><br>
						<label>Konfirmasi Password Baru</label>
						<?= form_error('kp','<small class="text-danger">','</small>'); ?>
						<input type="password" name="kp" class="form-control">
					</div>
					<div class="row justify-content-end">
						<a href="<?= base_url('home/profile'); ?>" class="btn btn-dark btn-sm">Kembali</a>
						<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
					</div>
</form>
				</div>
			</div>
		</div>
	</div>
</div>