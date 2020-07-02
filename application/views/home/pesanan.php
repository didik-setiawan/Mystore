<div class="container mb-5">
	<div class="row">
		<div class="col-lg-12 mb-5">
			<div class="card shadow mt-3 mb-3 mb-5">
				<div class="card-body mb-5">
					<h3 class="text-center text-primary">Pesanan</h3>
					<?= $this->session->flashdata('pesan'); ?>
					<?php if(empty($pesan)): ?>
						<div class="alert alert-primary">Anda Tidak Punya Pemesanan Barang</div>
						<?php else: ?>
							<?php foreach ($pesan as $p) { ?>
								<div class="row">
									<div class="col-lg-9">
										<small>Tgl Pesan : <?= $p['tgl_pesan']; ?></small><br>
								<small>Batas Bayar : <?= $p['batas_bayar']; ?></small>
									</div>
									<div class="col-lg-3">
										<small>Kodepos : <?= $p['kodepos']; ?></small><br>
										<small>Alamat : <?= $p['alamat']; ?></small>
									</div>
								</div>
								
								<table class="table table-hover">
									<thead class="bg-dark text-light">
										<tr>
											<th>Id</th>
											<th>Total Item</th>
											<th>Total Harga</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?= $p['id']; ?></td>
											<td><?= $p['jumlah']; ?></td>
											<td>Rp. <?= $p['total']; ?></td>
											<td><?= $p['status']; ?></td>
											<td>
												<a href="<?= base_url('home/detail_pesan/') . $p['id']; ?>" class="badge badge-primary">Detail</a>
											</td>
										</tr>
									</tbody>
								</table>
								<hr>
							<?php } ?>
							<div class="alert alert-primary">
								<i>Untuk Pembayaran Bisa Menghubungi Kami Di Bawah Ini</i>
								<div class="row">
									<div class="col-lg-3">
										<i class="fa fa-phone"> 089234XXXXXX </i>
									</div>
									<div class="col-lg-3">
										<b><i class="fab fa-whatsapp"> 085806XXXXXX </i></b>
									</div>
									<div class="col-lg-3">
										<b><i class="fab fa-yahoo"> Didiksetyaone@yahoo.com </i></b>
									</div>
									<div class="col-lg-3">
										<b><i class="fab fa-facebook-messenger"> Didiksetyaone </i></b>
									</div>
								</div>
							</div>

						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br><br><br>