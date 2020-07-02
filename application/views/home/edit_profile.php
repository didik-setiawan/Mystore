<div class="container">
	<div class="row mt-3">
		<div class="col-lg-12">
			<div class="card shadow">
				<div class="card-body">
					<h3 class="text-primary text-center">Edit Profile</h3>
					<?= $this->session->flashdata('pesan'); ?>
					<?= form_open_multipart('home/edit_profile'); ?>
					<div class="row">
						<div class="col-lg-6">
							<label>Nama Lengkap</label>
							<?= form_error('nama','<small class="text-danger">','</small>') ?>
							<input type="text" name="nama" class="form-control" value="<?= $user['nama']; ?>">
						</div>
						<div class="col-lg-6">
							<label>Email</label>
							<input type="text" name="email" class="form-control" value="<?= $user['email']; ?>" disabled>
						</div>

						<div class="col-lg-6">
							<label>No Telp</label>
							<?= form_error('telp','<small class="text-danger">','</small>') ?>
							<input type="text" name="telp" class="form-control" value="<?= $user['no_telp']; ?>">
						</div>
						<?php 
						$jk = ['laki-laki','perempuan'];
						?>
						<div class="col-lg-6">
							<label>Jenis Kelamin</label>
							<select class="form-control" name="jk">
								<?php foreach ($jk as $j) { ?>
									<?php if($j == $user['jk']): ?>
										<option value="<?= $j; ?>" selected> <?= $j; ?> </option>
										<?php else: ?>
											<option value="<?= $j; ?>"> <?= $j; ?> </option>
										<?php endif; ?>
									<?php } ?>
								</select>
							</div>

							<div class="col-md-2 mt-2">
								<label>Foto</label>
								<img src="<?= base_url('assets/img/') . $user['img'] ?>" class="img-thumbnail">
							</div>
							<div class="col-md-4 mt-2">
								<label>Edit Foto</label>
								<input type="file" name="img" class="form-control">
							</div>

						</div>
						<div class="row justify-content-end">
							<a href="<?= base_url('home/profile'); ?>" class="btn btn-dark btn-sm">Kembali</a>
							<button type="submit" class="btn btn-info btn-sm">Simpan</button>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>	
	</div>