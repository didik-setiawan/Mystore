
<div class="page-wrapper">
	<div class="container-fluid">
		<h3 class="text-center">Tambah Barang</h3>
		<div class="row">
			<div class="col-12">
				<div class="card shadow">
					<div class="card-body">
						<?= $this->session->flashdata('pesan'); ?>
						<?= form_open_multipart('dashboard/add_barang'); ?>
						<div class="row justify-content-center">
							<div class="col-lg-6">
								<label>Nama Barang</label>
								<?= form_error('barang','<small class="text-danger">','</small>'); ?>
								<input type="text" name="barang" id="barang" class="form-control">
							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<label for="formControlSelect">Merk</label>
									<select class="form-control" id="formControlSelect" name="merk">
										<?php foreach ($merk as $m) { ?>
											<option value="<?= $m['id'] ?>"><?= $m['merk']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<label for="formControlSelect">Produk</label>
									<select class="form-control" id="formControlSelect" name="produk">
										<?php foreach ($produk as $p) { ?>
											<option value="<?= $p['id'] ?>"><?= $p['produk']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-lg-6">
								<label>Harga</label>
								<?= form_error('harga','<small class="text-danger">','</small>'); ?>
								<input type="number" name="harga" class="form-control">
							</div>

							<div class="col-lg-6">
								<label>Stok</label>
								<?= form_error('stok','<small class="text-danger">','</small>'); ?>
								<input type="number" name="stok" class="form-control">
							</div>

							<div class="col-lg-6">
								<label>Foto</label>
								<small class="text-muted">Max size 2 Mb</small>
								<input type="file" name="img" class="form-control">
							</div>

							<div class="col-12">
								<div class="form-group">
									<label for="cono1" class="text-center">Deskripsi</label>
									<?= form_error('deskripsi','<small class="text-danger">','</small>'); ?>
									<div class="col-sm-12">
										<textarea class="form-control" name="deskripsi"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="row justify-content-end">
							<a href="<?= base_url('dashboard/barang'); ?>" class="btn btn-primary btn-rounded">Kembali</a>
							<button type="submit" class="btn btn-success btn-rounded ml-2">Upload</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
