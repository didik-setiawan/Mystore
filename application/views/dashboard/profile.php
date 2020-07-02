
<div class="page-wrapper">
	<div class="container-fluid">
		<h3 class="text-center">Edit Profile</h3>
		<div class="row">
			<div class="col-12">
				<div class="card shadow">
					<?= form_open_multipart('dashboard/profile'); ?>
					<div class="card-body">
						<div class="row">
							<div class="col-lg-6">
								<label>Nama</label>
								<?= form_error('nama','<small class="text-danger">','</small>') ?>
								<input type="text" name="nama" class="form-control" value="<?= $admin['nama']; ?>">
							</div>
							<div class="col-lg-6">
								<label>Username</label>
								<?= form_error('username','<small class="text-danger">','</small>') ?>
								<input type="text" name="username" class="form-control" value="<?= $admin['username']; ?>">
							</div>
							<div class="col-sm-2 mt-2">
								<label>Foto</label>
								<img src="<?= base_url('assets/img/') . $admin['img']; ?>" class="img-thumbnail">
							</div>
							<div class="col-md-4 mt-2">
								<label>Edit Foto</label>
								<input type="file" name="img" class="form-control">
							</div>
						</div>
						<div class="row justify-content-end">
							<button type="submit" class="btn btn-info btn-rounded">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
