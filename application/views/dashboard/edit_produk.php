
<div class="page-wrapper">
	<div class="container-fluid">
		<h3 class="text-center">Edit Produk</h3>
		<form action="<?= base_url('dashboard/edit_produk/') . $produk['id']; ?>" method="post">
			<div class="row">
				<div class="col-lg-9">
					<?= form_error('produk','<small class="text-danger">','</small>'); ?>
					<input type="text" name="produk" id="produk" placeholder="Nama Produk" class="form-control" value="<?= $produk['produk']; ?>">
				</div>
				<div class="col-lg-3">
					<button type="submit" class="btn btn-primary btn-rounded">Edit</button>
				</div> 
			</div>
		</form>

	</div>
