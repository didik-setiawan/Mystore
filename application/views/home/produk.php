<div class="container">
	<div class="row">

			<?php foreach ($barang as $b) { ?>
				<div class="col-lg-3">
					<div class="card shadow mt-3 mb-3">
						<a href="<?= base_url('home/detail_barang/') . $b['id']; ?>">
							<div class="card-body">
								<div class="row justify-content-center">
									<img src="<?= base_url('assets/upload/img/') . $b['img']; ?>" class="img-thumbnail">
								</div>
							</div>
						</a>
						<p class="text-center"><?= $b['barang']; ?></p>
						<?php if($b['diskon'] == 0): ?>
							<p class="text-primary ml-4">Rp. <?= $b['harga']; ?></p>
							<?php else: ?>
								<div class="row ml-2">
									<p class="text-primary ml-4">Rp. <?= $b['harga_diskon']; ?></p>
									<span class="badge badge-danger ml-3"><p class="mt-2">Off <?= $b['diskon'] ?>%</p></span>
								</div>
								<small class="text-muted ml-4 mb-3"><s>Rp. <?= $b['harga']; ?></s></small>
							<?php endif; ?>
						</div>
					</div>
				<?php } ?>

		</div>
	</div>