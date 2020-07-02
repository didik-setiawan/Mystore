<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-7 mt-3">
			<div class="card shadow mt-5">
				<div class="card-header bg-dark text-light">
					<h4 class="text-center">Register</h4>
				</div>
				<form action="<?= base_url('login/register'); ?>" method="post">
					<div class="card-body">
						<?= $this->session->flashdata('pesan'); ?>
						<?= form_error('nama','<small class="text-danger">','</small>'); ?>
						<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
						<?= form_error('email','<small class="text-danger">','</small>'); ?>
						<input type="email" name="email" class="form-control mt-3" placeholder="Email">
						<?= form_error('telp','<small class="text-danger">','</small>'); ?>
						<input type="number" name="telp" class="form-control mt-3 mb-3" placeholder="No Telp">
						<label>Jenis Kelamin</label>
						<select class="form-control" name="jk">
							<option value="laki-laki">Laki-Laki</option>
							<option value="perempuan">Perempuan</option>
						</select>
						<?= form_error('pass','<small class="text-danger">','</small>'); ?>
						<input type="password" name="pass" class="form-control mt-3" placeholder="Password">
						<?= form_error('password','<small class="text-danger">','</small>'); ?>
						<input type="password" name="password" class="form-control mt-3" placeholder="Konfirmasi Password">
						<div class="row justify-content-center mt-3">
							<button class="btn btn-primary btn-md mr-5" type="submit">Register</button>
							<a href="<?= base_url('login'); ?>" class="btn btn-outline-dark btn-md ml-5">Login</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>	
</div>