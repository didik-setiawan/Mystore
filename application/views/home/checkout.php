<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow mt-3 mb-3">
				<form action="<?= base_url('home/checkout'); ?>" method="post">
				<div class="card-body">
					<h3 class="text-primary text-center">Checkout</h3>
					<?= $this->session->flashdata('pesan'); ?>					
					<div class="row">
						<div class="col-lg-6">
							<label>Nama</label>
							<?= form_error('nama','<small class="text-danger">','</small>'); ?>
							<input type="text" name="nama" class="form-control" value="<?= $user['nama']; ?>">
						</div>
						<div class="col-lg-6">
							<label>Kodepos</label>
							<?= form_error('pos','<small class="text-danger">','</small>'); ?>
							<input type="number" name="pos" class="form-control">
						</div>
						<div class="col-lg-12">
							<label>Alamat</label>
							<?= form_error('alamat','<small class="text-danger">','</small>'); ?>
							<textarea class="form-control" name="alamat"></textarea>
						</div>
					</div>
					<h3 class="text-primary text-center mt-3">Barang Pesanan</h3>
					<table class="table table-hover">
						<thead class="bg-dark text-light">
							<tr>
								<th>Nama</th>
								<th>Harga</th>
								<th>Jumlah</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($this->cart->contents() as $cart) { ?>
								<tr>
									<td><?= $cart['name']; ?></td>
									<td>Rp. <?= $cart['price']; ?></td>
									<td><?= $cart['qty']; ?></td>
									<th>Rp. <?= $cart['subtotal']; ?></th>
								</tr>
							<?php } ?>
							<tr>
								<td colspan="3">Total</td>
								<td colspan="3">Rp. <?= $this->cart->total(); ?></td>
							</tr>
						</tbody>
					</table>
					<div class="row justify-content-end">
						<a href="<?= base_url('home/kembali'); ?>" class="btn btn-dark btn-sm">Kembali</a>
						<button type="submit" class="btn btn-primary btn-sm">Checkout</button>
					</div>
				</div>
</form>
			</div>
		</div>
	</div>
</div>