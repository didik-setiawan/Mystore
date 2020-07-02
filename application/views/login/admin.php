<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-5 mt-5">
			<div class="card border-dark shadow mt-5">
				<div class="card-header bg-dark text-light">
					<h5 class="text-center">
						<strong>Sign in</strong>
					</h5>
				</div>
				<div class="card-body">
					<?= $this->session->flashdata('pesan'); ?>
					<form action="<?= base_url('auth'); ?>" method="post">
						<?= form_error('username','<small class="text-danger">','</small>'); ?>
						<div class="md-form">
							<input type="text" name="username" class="form-control" id="materialLoginFormEmail">
							<label for="materialLoginFormEmail">Username</label>
						</div>
						<?= form_error('password','<small class="text-danger">','</small>'); ?>
						<div class="md-form">
							<input type="password" name="password" class="form-control" id="materialLoginFormPass">
							<label for="materialLoginFormPass">Password</label>
						</div>
						<div class="row justify-content-center">
							<button type="submit" class="btn btn-outline-dark btn-rounded">Sign in</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>