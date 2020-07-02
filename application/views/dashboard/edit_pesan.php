
<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<h3 class="text-center">Edit Pesanan</h3>
				<div class="card">
					<div class="card-body">
						<form action="<?= base_url('dashboard/editing/') . $pesan['id'] ?>" method="post">
						<div class="row">
							<div class="col-lg-6">
								<label>Bayar</label>
								<select class="form-control" name="bayar">
									<?php foreach ($bayar as $b) { ?>
										<?php if($b == $pesan['bayar']): ?>
										<option value="<?= $b ?>" selected><?= $b ?></option>
										<?php else: ?>
										<option value="<?= $b ?>"><?= $b ?></option>
									<?php endif; ?>
									<?php } ?>
								</select>
							</div>	
							<div class="col-lg-6">
								<label>Status</label>
								<select class="form-control" name="status">
									<?php foreach ($status as $s) { ?>
										<?php if($s == $pesan['status']): ?>
										<option value="<?= $s ?>" selected><?= $s ?></option>
										<?php else: ?>
										<option value="<?= $s ?>"><?= $s ?></option>
									<?php endif; ?>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="row justify-content-end mt-3">
							<a href="<?= base_url('dashboard/pesanan'); ?>" class="btn btn-dark btn-sm mr-2">Kembali</a>
							<button type="submit" class="btn btn-info btn-sm">Simpan</button>
						</div>
						</form> 
					</div>
				</div>
			</div>
		</div>
	</div>
