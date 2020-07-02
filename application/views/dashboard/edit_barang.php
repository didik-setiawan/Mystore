
<div class="page-wrapper">
	<div class="container-fluid">
		<h3 class="text-center">Edit Barang</h3>
		<div class="row">
			<div class="col-12">
				<div class="card shadow">
					<div class="card-body">
						<?= form_open_multipart('dashboard/edit_barang/'.$barang['id']); ?>
						<div class="row">
							<div class="col-lg-6">
								<label>Nama Barang</label>
								<?= form_error('barang','<small class="text-danger">','</small>'); ?>
								<input type="text" name="barang" class="form-control" value="<?= $barang['barang']; ?>">
							</div>
							<div class="col-lg-6">
								<label>Produk</label>
								<select class="form-control" name="produk">
									<?php foreach ($produk as $p) {?>
										<?php if($p['id'] == $barang['id_produk']): ?>
											<option value="<?= $p['id']; ?>" selected><?= $p['produk']; ?></option>
											<?php else: ?>
												<option value="<?= $p['id']; ?>"><?= $p['produk']; ?></option>
											<?php endif; ?>
										<?php } ?>
									</select>
								</div>

								<div class="col-lg-6 mt-2">
									<label>Merk</label>
									<select class="form-control" name="merk">
										<?php foreach ($merk as $m): ?>
											<?php if ($m['id'] == $barang['id_merk']): ?>
												<option value="<?= $m['id'] ?>" selected><?= $m['merk'] ?></option>
												<?php else: ?>
													<option value="<?= $m['id'] ?>"><?= $m['merk'] ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-lg-6 mt-2">
										<label>Harga</label>
										<?= form_error('harga','<small class="text-danger">','</small>'); ?>
										<input type="number" name="harga" class="form-control" value="<?= $barang['harga']; ?>">
									</div>
									<div class="col-lg-6 mt-2">
										<label>Stok</label>
										<?= form_error('stok','<small class="text-danger">','</small>'); ?>
										<input type="number" name="stok" class="form-control" value="<?= $barang['stok']; ?>">
									</div>
									<div class="col-sm-2 mt-2">
										<label>Foto</label>
										<img src="<?= base_url('assets/upload/img/') . $barang['img']; ?>" class="img-thumbnail">
									</div>
									<div class="col-lg-4 mt-2">
										<label>Foto Baru</label>
										<input type="file" name="img" class="form-control">
									</div>
									<div class="col-lg-6">
										<label>Diskon (%)</label>
										<?= form_error('diskon','<small class="text-danger">','</small>'); ?>
										<input type="number" name="diskon" class="form-control" value="<?= $barang['diskon']; ?>">
									</div>
									<div class="col-lg-12 mt-2">
										<label>Deskripsi</label>
										<?= form_error('deskripsi','<small class="text-danger">','</small>'); ?>
										<textarea class="form-control" name="deskripsi"><?= $barang['deskripsi']; ?></textarea>
									</div>
								</div>
								<div class="row justify-content-end mt-3 mr-2">
									<a href="<?= base_url('dashboard/barang'); ?>" class="btn btn-dark btn-rounded mr-2">Kembali</a>
									<button type="submit" class="btn btn-primary btn-rounded">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
