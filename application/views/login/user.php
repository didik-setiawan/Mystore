<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-6 mt-5">
			<div class="card shadow mt-5">
				<div class="card-header bg-dark text-light">
					<h4 class="text-center">Sign In</h4>
				</div>
				<form action="<?= base_url('login'); ?>" method="post">
					<div class="card-body">
						<?= $this->session->flashdata('pesan'); ?>
						<?= form_error('username','<small class="text-danger">','</small>'); ?>
						<input type="text" name="username" class="form-control" placeholder="Email / No Telp" required="required" autocomplete="off">
						<?= form_error('pass','<small class="text-danger">','</small>'); ?>
						<input type="password" name="pass" class="form-control mt-3" placeholder="Password" required="required">
						<div class="row justify-content-center mt-3">
							<button class="btn btn-primary btn-md mr-5" type="submit">Login</button>
							<a href="<?= base_url('login/register'); ?>" class="btn btn-outline-dark btn-md ml-5">Register</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>