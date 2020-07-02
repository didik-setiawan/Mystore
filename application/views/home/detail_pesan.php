<div class="container mt-3">
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow">
				<div class="card-body">
					<h3 class="text-primary text-center">Detail Pesanan</h3>
					<div class="row">
						<div class="col-lg-10">
							<small>ID Pesanan : <?= $pesan['id']; ?></small><br>
							<small>Nama : <?= $pesan['nama']; ?></small><br>
							<small>Status : <?= $pesan['status']; ?></small>
						</div>
						<div class="col-lg-2">
							<small>Tgl Pesan : <?= $pesan['tgl_pesan']; ?></small><br>
							<small>Batas Bayar : <?= $pesan['batas_bayar']; ?></small><br>
							<small>Bayar : <?= $pesan['bayar']; ?></small>
						</div>
					</div>
					<table class="table table-hover">
						<thead class="bg-dark text-light">
							<tr>
								<th>Barang</th>
								<th>Harga</th>
								<th>Jumlah</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($barang as $key) { ?>
								<tr>
									<td><?= $key['barang']; ?></td>
									<?php if($key['diskon'] == 0): ?>
										<td>Rp. <?= $key['harga']; ?></td>
										<?php else: ?>
											<td>Rp.<?= $key['harga_diskon']; ?></td>
										<?php endif; ?>
										<td><?= $key['jumlah']; ?></td>
										<td>Rp. <?= $key['subtotal']; ?></td>
									</tr>
								<?php } ?>
								<tr class="bg-dark text-light">
									<td colspan="3">Total Item</td>
									<td colspan="3"><?= $pesan['jumlah']; ?></td>
								</tr>
								<tr class="bg-dark text-light">
									<td colspan="3">Total Harga</td>
									<td colspan="3">Rp. <?= $pesan['total']; ?></td>
								</tr>
							</tbody>
						</table>
						<div class="row justify-content-end">
							<a href="<?= base_url('home/pesanan'); ?>" class="btn btn-primary btn-sm">Kembali</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>