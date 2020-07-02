
<div class="page-wrapper">
	<div class="container-fluid">
		<h3 class="text-center">Edit Merk</h3>
<form action="<?= base_url('dashboard/edit_merk/') . $mark['id']; ?>" method="post">
		<div class="row">
			<div class="col-lg-9">
				<?= form_error('merk','<small class="text-danger">','</small>'); ?>
				<input type="text" name="merk" id="merk" placeholder="Nama Merk" class="form-control" value="<?= $mark['merk']; ?>">
			</div>
			<div class="col-lg-3">
				<button type="submit" class="btn btn-primary btn-rounded">Edit</button>
			</div>
		</div>
</form>
	</div>
