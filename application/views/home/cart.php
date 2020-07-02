<div class="container">
	<div class="row">
		<div class="col-lg-8">
			<div class="card shadow mt-3 mb-3">
				<div class="card-body">
					<h3 class="text-center text-primary">Keranjang</h3>
					<?php if(empty($cart)): ?>
						<div class="alert alert-info">Keranjang Anda Masih Kosong</div>
						<?php else: ?>
							<table class="table table-hover">
								<thead class="bg-dark text-light">
									<tr>
										<th>Nama Barang</th>
										<th>Harga</th>
										<th>Jumlah</th>
										<th>Subtotal</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($cart as $c) { ?>
										<tr>
											<td><?= $c['name']; ?></td>
											<td>Rp. <?= $c['price'] ?></td>
											<td><?= $c['qty']; ?></td>
											<td><?= $c['subtotal']; ?></td>
											<td><a href="<?= base_url('home/trash/') . $c['rowid']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
										</tr>
									<?php } ?>
									<tr>
										<th colspan="3">Total</th>
										<th colspan="3">Rp. <?= $this->cart->total(); ?></th>
									</tr>
								</tbody>
							</table>
						<div class="row justify-content-end">
							<a href="<?= base_url('home/kosong_keranjang'); ?>" class="btn btn-dark btn-sm">Kosongkan Keranjang</a>
							<a href="<?= base_url('home/check'); ?>" class="btn btn-primary btn-sm">Checkout</a>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card shadow mt-3 text-center">
					<div class="card-body">
						<h4 class="text-primary">Produk Lainnya</h4>
						<?php foreach ($b as $b): ?>
<a href="<?= base_url('home/detail_barang/') . $b['id']; ?>">
							<div class="row mt-3">
								<div class="col-sm-4">
									<img src="<?= base_url('assets/upload/img/') . $b['img']; ?>" class="img-thumbnail">
								</div>
								<div class="col-md-8">
									<p class="text-dark"><?= $b['barang']; ?></p>
									<?php if($b['diskon'] == 0): ?>
									<small class="text-primary">Rp. <?= $b['harga']; ?></small>
									<?php else: ?>
										<div class="row ml-2">
											<small class="text-primary">Rp. <?= $b['harga_diskon']; ?></small>
											<span class="badge badge-danger ml-3"><p class="mt-2">Off <?= $b['diskon']; ?>%</p></span>
										</div>
										<small class="text-muted">Rp. <s><?= $b['harga']; ?></s></small>
									<?php endif; ?>
								</div>
							</div>
</a>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>