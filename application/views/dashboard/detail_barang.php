
        <div class="page-wrapper">
            <div class="container-fluid">
            	<?php 
            	$id = $this->uri->segment(3);
            	$b = "SELECT * FROM tb_barang RIGHT JOIN tb_produk ON tb_barang.id_produk = tb_produk.id WHERE tb_barang.id = $id";
            	$bb = $this->db->query($b)->row_array();
            	 ?>
            	<h3 class="text-center">Detail Barang</h3>
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                        	<div class="row no-gutters">
                        		<div class="col-lg-4">
                        			<img src=" <?= base_url('assets/upload/img/') . $barang['img']; ?>" class="img-thumbnail mt-1">
                        		</div>
                        		<div class="col-lg-4">
                        			<div class="card-body">
                        				<p>Nama Barang : <?= $barang['barang']; ?></p>
                        				<p>Produk : <?= $bb['produk']; ?></p>
                        				<P>Stok : <?= $barang['stok']; ?></P>
                                        <small class="text-muted">Tgl Upload : <?= date('d M Y',$barang['tgl_upload']); ?></small>
                        			</div>
                        		</div>
                        		<div class="col-lg-4">
                        			<div class="card-body">
                        				<p>Merk : <?= $barang['merk']; ?></p>
                        				<p>Harga : Rp. <?= $barang['harga']; ?></p>
                                        <p>Update Terakhir : <?= date('d M Y',$barang['date_update']); ?></p>
                        			</div>
                        		</div>
                        		<div class="col-lg-11 mt-3 mb-3 mr-1 ml-1">
                        			<p>Deskripsi Penjual</p>
                        			<textarea class="form-control" disabled><?= $barang['deskripsi']; ?></textarea>
                        		</div>

                        	</div>
                        	<div class="row justify-content-end mr-3 mb-3">
                        		<a href="<?= base_url('dashboard/barang'); ?>" class="btn btn-dark btn-rounded">Kembali</a>
                        		<a href="<?= base_url('dashboard/edit_barang/' . $id); ?>" class="btn btn-primary btn-rounded ml-2">Edit</a>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
           