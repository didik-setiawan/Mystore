<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow mt-3 mb-3">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-4">
							<div class="row justify-content-center">
								<img src="<?= base_url('assets/upload/img/') . $barang['img']; ?>" class="img-thumbnail">
							</div>
						</div>

						<div class="col-lg-4">
							
							<h4 class="text-primary"><?= $barang['barang']; ?></h4>
							<?php if($barang['diskon'] == 0) : ?>
								<p class="text-muted">Rp. <?= $barang['harga']; ?></p>
								<?php else: ?>
									<div class="row ml-2">
										<p class="text-muted">Rp. <?= $barang['harga_diskon']; ?></p>
										<span class="badge badge-danger ml-3"><p class="mt-2">Off <?= $barang['diskon'] ?>%</p></span>
									</div>
									<small class="text-muted">Rp. <s><?= $barang['harga'] ?></s></small><br>
								<?php endif; ?>
								<?php if($barang['stok'] == 0): ?>
									<small class="text-danger">Stok : <?= $barang['stok']; ?></small><br>
									<?php else: ?>
									<p>Pesan</p>
										<form action="<?= base_url('home/detail_barang/') . $barang['id']; ?>" method="post">
											<div class="row">
												<div class="col-sm-4">
													<?= form_error('qty','<small class="text-danger">','</small>'); ?>
													<input type="number" name="qty" class="form-control">
												</div>
												<button type="submit" class="btn btn-primary btn-sm ml-3"><i class="fa fa-shopping-cart"></i> Tambah Ke Keranjang</button>
											</div>
										</form>
										<small class="text-muted">Stok : <?= $barang['stok']; ?></small><br>
									<?php endif; ?>
									<small class="text-muted">Terakhir Update : <?= date('d M Y',$barang['date_update']); ?></small>
									<h4 class="text-primary mt-3">Deskripsi Barang</h4>
									<textarea class="form-control" readonly=""><?= $barang['deskripsi']; ?></textarea>
								</div>

								<div class="col-lg-4">
									<h4 class="text-primary">Produk Lainnya</h4>
									<?php foreach ($b as $b) { ?>
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
																<span class="badge badge-danger ml-2">Off <?= $b['diskon']; ?>%</span>
															</div>
															<small class="text-muted">Rp. <s><?= $b['harga'] ?></s></small>
														<?php endif; ?>
													</div>
												</div>
											</a>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>